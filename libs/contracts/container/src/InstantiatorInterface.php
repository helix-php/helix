<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Container;

use Helix\Contracts\ParamResolver\ValueResolverInterface;

interface InstantiatorInterface
{
    /**
     * Attempts to create a new instance of an object by its identifier.
     *
     * @template TService of object
     *
     * @param non-empty-string|class-string<TService> $id
     * @param iterable<ValueResolverInterface|class-string<ValueResolverInterface>> $resolvers
     * @return TService
     */
    public function make(string $id, iterable $resolvers = []): object;
}
