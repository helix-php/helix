<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver;

use Helix\ParamResolver\Exception\NotResolvableException;
use Helix\ParamResolver\Exception\ParamResolverException;
use Helix\ParamResolver\Exception\SignatureException;
use Helix\ParamResolver\Metadata\Factory;
use Helix\ParamResolver\Metadata\ParameterInterface;
use Helix\ParamResolver\Metadata\Printer;
use Helix\ParamResolver\Metadata\Repository;
use Helix\ParamResolver\Resolver\CheckingResolverInterface;
use Helix\ParamResolver\Resolver\DefaultValueResolver;
use Helix\ParamResolver\Resolver\NullableParameterResolver;
use Helix\ParamResolver\Resolver\ResolverInterface;

final class SignatureResolver implements SignatureResolverInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_PARAM_NOT_RESOLVABLE = 'Could not resolve parameter #%d [%s]';

    /**
     * @var array<class-string<ResolverInterface>>
     */
    private const DEFAULT_RESOLVERS = [
        DefaultValueResolver::class,
        NullableParameterResolver::class,
    ];

    /**
     * @var array<ResolverInterface>
     */
    private array $resolvers = [];

    /**
     * @var Factory
     */
    private readonly Factory $factory;

    /**
     * @var Repository
     */
    private readonly Repository $repository;

    /**
     * @var Printer
     */
    private readonly Printer $printer;

    /**
     * @param iterable<array-key, ResolverInterface> $resolvers
     */
    public function __construct(
        iterable $resolvers = [],
    ) {
        $this->printer = new Printer();

        $this->repository = new Repository(
            $this->factory = new Factory(),
        );

        $this->append(...$resolvers, ...$this->getDefaultResolvers());
    }

    /**
     * @return iterable<ResolverInterface>
     */
    private function getDefaultResolvers(): iterable
    {
        $result = [];

        foreach (self::DEFAULT_RESOLVERS as $class) {
            $result[] = new $class();
        }

        return $result;
    }

    /**
     * @param ResolverInterface ...$resolvers
     * @return void
     */
    public function append(ResolverInterface ...$resolvers): void
    {
        foreach ($resolvers as $resolver) {
            $this->resolvers[] = $resolver;
        }
    }

    /**
     * @param ResolverInterface ...$resolvers
     * @return void
     */
    public function prepend(ResolverInterface ...$resolvers): void
    {
        \array_unshift($this->resolvers, ...$resolvers);
    }

    /**
     * @param ResolverInterface ...$resolvers
     * @return $this
     */
    public function with(ResolverInterface ...$resolvers): self
    {
        $self = clone $this;
        $self->prepend(...$resolvers);

        return $self;
    }

    /**
     * @param iterable<array-key, ParameterInterface> $parameters
     * @return iterable
     * @psalm-suppress InvalidReturnType
     */
    private function resolve(iterable $parameters): iterable
    {
        $result = [];

        foreach ($parameters as $id => $parameter) {
            foreach ($this->resolvers as $resolver) {
                if ($resolver instanceof CheckingResolverInterface) {
                    if ($resolver->supports($parameter)) {
                        $result[] = $resolver->resolve($parameter);

                        continue 2; // goto next parameter
                    }

                    continue; // goto next resolver
                }

                $value = $resolver->resolve($parameter);

                if ($value !== null) {
                    $result[] = $value;

                    continue 2; // goto next parameter
                }
            }

            $param = $this->printer->parameter($parameter);
            $message = \sprintf(self::ERROR_PARAM_NOT_RESOLVABLE, $id, $param);

            throw new NotResolvableException($parameter, $message);
        }

        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function byFunction(string $name, iterable $resolvers = []): iterable
    {
        try {
            $parameters = $this->repository->byFunction($name);
        } catch (ParamResolverException $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw new SignatureException($e->getMessage(), (int)$e->getCode(), $e);
        }

        return $this->with(...$resolvers)->resolve($parameters);
    }

    /**
     * {@inheritDoc}
     */
    public function byMethod(object|string $class, string $name, iterable $resolvers = []): iterable
    {
        try {
            $parameters = $this->repository->byMethod($class, $name);
        } catch (ParamResolverException $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw new SignatureException($e->getMessage(), (int)$e->getCode(), $e);
        }

        return $this->with(...$resolvers)->resolve($parameters);
    }

    /**
     * {@inheritDoc}
     */
    public function byCallable(callable $callable, iterable $resolvers = []): iterable
    {
        try {
            $parameters = $this->repository->byCallable($callable);
        } catch (ParamResolverException $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw new SignatureException($e->getMessage(), (int)$e->getCode(), $e);
        }

        return $this->with(...$resolvers)->resolve($parameters);
    }
}
