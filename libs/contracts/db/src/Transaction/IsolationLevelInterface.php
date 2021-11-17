<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Database\Transaction;

/**
 * Transaction isolation levels are a measure of the extent to which transaction
 * isolation succeeds.
 */
interface IsolationLevelInterface
{
    /**
     * @return non-empty-string
     */
    public function getName(): string;
}
