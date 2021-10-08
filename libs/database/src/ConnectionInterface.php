<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database;

use Helix\Database\Connection\InteractWithTransactionInterface;
use Helix\Database\Connection\QuoterInterface;
use Helix\Database\Exception\DatabaseException;

interface ConnectionInterface extends
    QuoterInterface,
    InteractWithTransactionInterface
{
    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * @param non-empty-string|null $column
     * @return int|non-empty-string
     * @throws DatabaseException
     */
    public function lastInsertId(string $column = null): int|string;

    /**
     * @psalm-taint-sink sql $sql
     * @param non-empty-string $sql
     * @param array $params
     * @return QueryInterface
     * @throws DatabaseException
     */
    public function query(string $sql, array $params = []): QueryInterface;
}
