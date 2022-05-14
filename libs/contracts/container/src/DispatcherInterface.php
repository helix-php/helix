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

interface DispatcherInterface
{
    /**
     * @param non-empty-string|callable $fn
     * @param iterable<ValueResolverInterface|class-string<ValueResolverInterface>> $resolvers
     * @return mixed
     */
    public function call(string|callable $fn, iterable $resolvers = []): mixed;
}
