<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\Connection\Pool;

/**
 * @template TReference of object
 * @template TConnection of object
 */
interface PoolManagerInterface
{
    /**
     * @param string $name
     * @return PoolInterface<TReference, TConnection>
     */
    public function get(string $name): PoolInterface;
}
