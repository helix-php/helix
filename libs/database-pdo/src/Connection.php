<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO;

use Helix\Database\Connection as BaseConnection;
use Helix\Database\DriverInterface;
use Helix\Database\QueryInterface;

abstract class Connection extends BaseConnection
{
    /**
     * @param DriverInterface $driver
     * @param \PDO $pdo
     */
    public function __construct(
        protected DriverInterface $driver,
        public \PDO $pdo,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function transaction(\Closure $expr): self
    {
        try {
            $this->pdo->beginTransaction();
            $expr($this);
            $this->pdo->commit();
        } catch (\PDOException $e) {
            $this->pdo->rollBack();
            throw $this->driver->exception($e);
        } catch (\Throwable $e) {
            $this->pdo->rollBack();
            throw $e;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function inTransaction(): bool
    {
        return $this->pdo->inTransaction();
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
            throw $this->driver->exception($e);
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
    public function query(string $sql, array $params = []): QueryInterface
    {
        $stmt = $this->pdo->prepare($sql);

        return new Query($this->driver, $stmt, $params);
    }
}
