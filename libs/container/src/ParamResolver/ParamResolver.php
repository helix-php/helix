<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\ParamResolver;

use Helix\Container\Instantiator;
use Psr\Container\ContainerInterface;
use Helix\Contracts\Container\InstantiatorInterface;
use Helix\Container\Exception\NotResolvableException;
use Helix\Container\Exception\RecursiveDeclarationException;

final class ParamResolver
{
    /**
     * @var string
     */
    private const ERROR_NOT_RESOLVABLE = 'Could not resolve parameter #%d [%s] from %s';

    /**
     * @var ContainerInterface
     */
    private ContainerInterface $container;

    /**
     * @var TypeReader
     */
    private TypeReader $reader;

    /**
     * @var UserResolver
     */
    private UserResolver $resolver;

    /**
     * @var InstantiatorInterface
     */
    private InstantiatorInterface $instantiator;

    /**
     * @param ContainerInterface $container
     * @param InstantiatorInterface|null $instantiator
     */
    public function __construct(ContainerInterface $container, InstantiatorInterface $instantiator = null)
    {
        $this->container = $container;
        $this->instantiator = $instantiator ?? new Instantiator($this);
        $this->reader = new TypeReader();
        $this->resolver = new UserResolver();
    }

    /**
     * @param \ReflectionFunctionAbstract $fun
     * @param callable|array|null $resolver
     * @return array
     * @throws NotResolvableException
     * @throws RecursiveDeclarationException
     */
    public function resolve(\ReflectionFunctionAbstract $fun, callable|array $resolver = null): array
    {
        $resolver = $this->resolver->toCallableOrNull($resolver);
        $result = [];

        foreach ($this->reader->read($fun) as $param => $types) {
            try {
                $result[] = $this->fromTypes($param, $types, $resolver);
            } catch (\ReflectionException $e) {
                throw new NotResolvableException($e->getMessage());
            }
        }

        return $result;
    }

    /**
     * @param \ReflectionParameter $param
     * @param array<\ReflectionNamedType> $types
     * @param callable|null $resolver
     * @return mixed
     * @throws NotResolvableException
     * @throws RecursiveDeclarationException
     */
    private function fromTypes(\ReflectionParameter $param, array $types, ?callable $resolver): mixed
    {
        foreach ($types as $type) {
            // User-defined resolver
            if ($resolver !== null) {
                $result = $resolver($type, $param->getName());
                if ($result !== null) {
                    return $result;
                }
            }

            if ($this->container->has($type->getName())) {
                return $this->container->get($type->getName());
            }
        }

        if ($param->isDefaultValueAvailable()) {
            try {
                return $param->getDefaultValue();
            } catch (\ReflectionException) {
                // Never throws
                return null;
            }
        }

        if ($param->isOptional()) {
            return null;
        }

        // Try to instantiate by signature
        foreach ($types as $type) {
            try {
                return $this->instantiator->make($type->getName(), $resolver);
            } catch (RecursiveDeclarationException $e) {
                throw $e;
            } catch (\Throwable $e) {
                continue;
            }
        }

        $parameter = Renderer::parameterToString($param, $types);
        $function  = Renderer::functionToString($param->getDeclaringFunction());

        throw new NotResolvableException(
            \sprintf(self::ERROR_NOT_RESOLVABLE, $param->getPosition(), $parameter, $function)
        );
    }
}
