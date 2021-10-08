<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Connection;

use Helix\Database\Exception\DatabaseException;

interface InteractWithTransactionInterface
{
    /**
     * @param \Closure $expr
     * @return $this
     */
    public function transaction(\Closure $expr): self;

    /**
     * Checks if inside a transaction.
     *
     * @return bool
     */
    public function inTransaction(): bool;
}
