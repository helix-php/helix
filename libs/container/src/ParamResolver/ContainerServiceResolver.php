<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\ParamResolver;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class ContainerServiceResolver extends ValueResolver
{
    /**
     * @param ContainerInterface $container
     */
    public function __construct(
        private readonly ContainerInterface $container,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function supports(\ReflectionParameter $parameter): bool
    {
        $type = $parameter->getType();

        if (!$type instanceof \ReflectionNamedType || $type->isBuiltin()) {
            return false;
        }

        return $this->container->has($type->getName());
    }

    /**
     * {@inheritDoc}
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function resolve(\ReflectionParameter $parameter): object
    {
        /** @var \ReflectionNamedType $type */
        $type = $parameter->getType();

        return $this->container->get($type->getName());
    }
}
