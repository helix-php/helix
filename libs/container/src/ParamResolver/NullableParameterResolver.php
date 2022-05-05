<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\ParamResolver;

final class NullableParameterResolver extends ValueResolver
{
    /**
     * {@inheritDoc}
     */
    public function supports(\ReflectionParameter $parameter): bool
    {
        $type = $parameter->getType();

        return $type === null || $type->allowsNull();
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(\ReflectionParameter $parameter): mixed
    {
        return null;
    }
}
