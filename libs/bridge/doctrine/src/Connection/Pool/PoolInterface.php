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
 * @template-extends \IteratorAggregate<TReference|null, TConnection>
 */
interface PoolInterface extends \Countable, \IteratorAggregate
{
    /**
     * @param TReference|null $reference
     * @param Type $type
     * @return TConnection
     */
    public function get(?object $reference = null, Type $type = Type::DUPLEX): object;
}
