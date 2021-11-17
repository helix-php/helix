<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Database;

use Helix\Contracts\Database\Query\QueryProviderInterface;
use Helix\Contracts\Database\Transaction\TransactionProviderInterface;

interface TransactionInterface extends
    QueryProviderInterface,
    TransactionProviderInterface
{
    /**
     * @return void
     */
    public function commit(): void;
}
