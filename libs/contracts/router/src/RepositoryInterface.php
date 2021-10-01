<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Router;

/**
 * @template-extends \IteratorAggregate<mixed, RouteInterface>
 */
interface RepositoryInterface extends \IteratorAggregate, \Countable
{
    /**
     * @param non-empty-string $name
     * @return RouteInterface|null
     */
    public function find(string $name): ?RouteInterface;
}
