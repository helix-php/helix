<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Database\Transaction;

use Helix\Contracts\Database\TransactionInterface;

interface TransactionProviderInterface
{
    /**
     * @param IsolationLevelInterface|null $level
     * @return TransactionInterface
     */
    public function transaction(IsolationLevelInterface $level = null): TransactionInterface;
}
