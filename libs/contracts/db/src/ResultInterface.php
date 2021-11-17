<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Database;

interface ResultInterface extends \IteratorAggregate, \Countable
{
    /**
     * @param positive-int|0 $column
     * @return mixed
     */
    public function get(int $column = 0): mixed;
}
