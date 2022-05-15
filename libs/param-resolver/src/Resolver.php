<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver;

use Helix\Contracts\ParamResolver\ParamResolverInterface;
use Helix\Contracts\ParamResolver\RegistrarInterface;
use Helix\Contracts\ParamResolver\RepositoryInterface;
use Helix\Contracts\ParamResolver\ValueResolverInterface;
use Helix\ParamResolver\Exception\ParamNotResolvableException;
use Helix\ParamResolver\Exception\ParamResolverException;
use Helix\ParamResolver\Exception\SignatureException;
use Helix\ParamResolver\Reader\MemoizableReader;
use Helix\ParamResolver\Reader\ReaderInterface;
use Helix\ParamResolver\ValueResolver\DefaultValueResolver;
use Helix\ParamResolver\ValueResolver\NullableParameterResolver;
use Helix\ParamResolver\ValueResolver\ValueResolver;

final class Resolver implements
    ParamResolverInterface,
    RegistrarInterface,
    RepositoryInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_PARAM_NOT_RESOLVABLE = 'Could not resolve parameter #%d $%s';

    /**
     * @var array<class-string<ValueResolver>>
     */
    private const DEFAULT_RESOLVERS = [
        DefaultValueResolver::class,
        NullableParameterResolver::class,
    ];

    /**
     * @var array<ValueResolverInterface>
     */
    private array $resolvers = [];

    /**
     * @param iterable<array-key, ValueResolverInterface> $resolvers
     * @param ReaderInterface<\ReflectionParameter> $reader
     */
    public function __construct(
        iterable $resolvers = [],
        private readonly ReaderInterface $reader = new MemoizableReader(),
    ) {
        $this->append(...$resolvers, ...$this->getDefaultResolvers());
    }

    /**
     * @param ValueResolverInterface ...$resolvers
     * @return void
     */
    public function append(ValueResolverInterface ...$resolvers): void
    {
        foreach ($resolvers as $resolver) {
            $this->resolvers[] = $resolver;
        }
    }

    /**
     * @param ValueResolverInterface ...$resolvers
     * @return void
     */
    public function prepend(ValueResolverInterface ...$resolvers): void
    {
        \array_unshift($this->resolvers, ...$resolvers);
    }

    /**
     * @param ValueResolverInterface ...$resolvers
     * @return $this
     */
    public function with(ValueResolverInterface ...$resolvers): self
    {
        $self = clone $this;
        $self->prepend(...$resolvers);

        return $self;
    }

    /**
     * {@inheritDoc}
     */
    public function fromFunction(string $name, iterable $resolvers = []): iterable
    {
        try {
            $parameters = $this->reader->fromFunction($name);
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
    public function fromMethod(object|string $class, string $name, iterable $resolvers = []): iterable
    {
        try {
            $parameters = $this->reader->fromMethod($class, $name);
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
    public function fromClosure(\Closure $closure, iterable $resolvers = []): iterable
    {
        try {
            $parameters = $this->reader->fromClosure($closure);
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
    public function fromCallable(callable $callable, iterable $resolvers = []): iterable
    {
        try {
            $parameters = $this->reader->fromCallable($callable);
        } catch (ParamResolverException $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw new SignatureException($e->getMessage(), (int)$e->getCode(), $e);
        }

        return $this->with(...$resolvers)->resolve($parameters);
    }

    /**
     * @return iterable<ValueResolver>
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
     * @param iterable<\ReflectionParameter> $parameters
     * @return iterable
     * @throws ParamNotResolvableException
     * @psalm-suppress InvalidReturnType
     */
    private function resolve(iterable $parameters): iterable
    {
        $result = [];

        foreach ($parameters as $id => $parameter) {
            foreach ($this->resolvers as $resolver) {
                if ($resolver->supports($parameter)) {
                    $result[] = $resolver->resolve($parameter);

                    continue 2;
                }
            }

            $message = \sprintf(self::ERROR_PARAM_NOT_RESOLVABLE, $id, $parameter->getName());
            throw new ParamNotResolvableException($parameter, $message);
        }

        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): \Traversable
    {
        return $this->resolvers;
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return \count($this->resolvers);
    }
}