<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\ValueResolver;

final class DefaultValueResolver extends ValueResolver
{
    /**
     * {@inheritDoc}
     */
    public function supports(\ReflectionParameter $parameter): bool
    {
        return $parameter->isDefaultValueAvailable();
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(\ReflectionParameter $parameter): mixed
    {
        return $parameter->getDefaultValue();
    }
}
