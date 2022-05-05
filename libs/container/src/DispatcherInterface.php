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

interface DispatcherInterface
{
    /**
     * @param string|callable $fn
     * @param iterable<ValueResolverInterface> $resolvers
     * @return mixed
     */
    public function call(string|callable $fn, iterable $resolvers = []): mixed;
}
