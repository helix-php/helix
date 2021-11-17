<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO;

use Helix\Contracts\Database\Query\ExecutableQueryInterface;
use Helix\Contracts\Database\Transaction\IsolationLevelInterface;
use Helix\Contracts\Database\TransactionInterface;
use Helix\Database\Connection as BaseConnection;
use Helix\Database\ExceptionConverterInterface;

abstract class Connection extends BaseConnection
{
    /**
     * @param ExceptionConverterInterface $converter
     * @param \PDO $pdo
     */
    public function __construct(
        protected readonly ExceptionConverterInterface $converter,
        protected readonly \PDO $pdo,
    ) {
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function transaction(IsolationLevelInterface $level = null): TransactionInterface
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }

    /**
     * {@inheritDoc}
     */
    public function lastInsertId(string $column = null): int|string
    {
        try {
            $result = $this->pdo->lastInsertId($column);

            if (\is_numeric($result)) {
                return (int)$result;
            }

            return $result;
        } catch (\Throwable $e) {
            throw $this->converter->exception($e);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function quote(string $value): string
    {
        return $this->pdo->quote($value);
    }

    /**
     * {@inheritDoc}
     */
    public function query(string $query, iterable $params = []): ExecutableQueryInterface
    {
        return new ExecutableQuery($this->pdo, $this->converter, $query, $params);
    }
}
