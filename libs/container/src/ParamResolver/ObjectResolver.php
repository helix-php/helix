<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\ParamResolver;

/**
 * @template T of object
 */
class ObjectResolver extends ValueResolver
{
    /**
     * @param T $context
     */
    public function __construct(
        private readonly object $context,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function supports(\ReflectionParameter $parameter): bool
    {
        $type = $parameter->getType();

        if (!$type instanceof \ReflectionNamedType || !$type->isBuiltin()) {
            return false;
        }

        $name = $type->getName();

        return $this->context instanceof $name;
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(\ReflectionParameter $parameter): object
    {
        return $this->context;
    }
}
