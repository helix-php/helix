<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver;

interface SignatureResolverInterface
{
    /**
     * @param iterable<MetadataInterface> $parameters
     * @param iterable<ResolverInterface> $resolvers
     * @return iterable
     */
    public function resolve(iterable $parameters, iterable $resolvers = []): iterable;
}
