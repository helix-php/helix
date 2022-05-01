<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Resolver;

use Helix\ParamResolver\Metadata\ParameterInterface;

final class NullableParameterResolver implements CheckingResolverInterface
{
    /**
     * {@inheritDoc}
     */
    public function supports(ParameterInterface $parameter): bool
    {
        return $parameter->isNullable();
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(ParameterInterface $parameter): mixed
    {
        return null;
    }
}
