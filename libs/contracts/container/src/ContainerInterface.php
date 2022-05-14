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
use Psr\Container\ContainerInterface as PsrContainerInterface;

interface ContainerInterface extends PsrContainerInterface
{
    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @template TService of object
     *
     * @param class-string<TService>|non-empty-string $id
     * @param iterable<ValueResolverInterface|class-string<ValueResolverInterface>> $resolvers
     * @return TService
     */
    public function get(string $id, iterable $resolvers = []): object;

    /**
     * Returns {@see true} if the container can return an entry by the given
     * service identifier or returns {@see false} otherwise.
     *
     * @param non-empty-string $id
     * @return bool
     */
    public function has(string $id): bool;
}
