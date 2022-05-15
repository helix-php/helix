<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Pool;

/**
 * @template TReference of object
 * @template TEntry of object
 *
 * @template-extends \IteratorAggregate<TReference|null, TEntry>
 */
interface PoolInterface extends \Countable, \IteratorAggregate
{
    /**
     * @param TReference $reference
     * @return TEntry
     */
    public function get(object $reference): object;

    /**
     * @param TReference $reference
     * @return bool
     */
    public function has(object $reference): bool;
}
