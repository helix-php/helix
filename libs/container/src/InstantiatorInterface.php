<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container;

use Helix\Container\ParamResolver\ValueResolverInterface;

interface InstantiatorInterface
{
    /**
     * Attempts to create a new instance of an object by its identifier.
     *
     * @template T of object
     *
     * @param non-empty-string|class-string<T> $id
     * @param iterable<ValueResolverInterface> $resolvers
     * @return T
     */
    public function make(string $id, iterable $resolvers = []): object;
}
