<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO\SQLite;

use Helix\Database\ConnectionInterface;
use Helix\Database\DriverInterface;
use Helix\Database\Exception\ConnectionException;
use Helix\Database\Exception\SyntaxException;
use Helix\Database\PDO\Exception\DatabaseException as PDODatabaseException;
use Helix\Database\Exception\DatabaseException;

final class Driver implements DriverInterface
{
    /**
     * @param ConnectionInfo $info
     */
    public function __construct(
        private ConnectionInfo $info = new MemoryConnectionInfo()
    ) {
    }

    /**
     * @return ConnectionInterface
     * @throws DatabaseException
     */
    public function connect(): ConnectionInterface
    {
        return new Connection($this, $this->pdo());
    }

    /**
     * @return \PDO
     * @throws DatabaseException
     */
    private function pdo(): \PDO
    {
        try {
            return new \PDO(
                dsn: $this->info->getDsn(),
                username: $this->info->user,
                password: $this->info->password,
                options: $this->info->options,
            );
        } catch (\PDOException $e) {
            throw $this->exception($e);
        }
    }

    /**
     * @link http://www.sqlite.org/c3ref/c_abort.html
     * @link https://github.com/doctrine/dbal/blob/4.0.x/src/Driver/API/SQLite/ExceptionConverter.php
     *
     * {@inheritDoc}
     */
    public function exception(\Throwable $e, string $sql = null): DatabaseException
    {
        if ($e instanceof \PDOException) {
            $e = PDODatabaseException::create($e);
        }

        $message = $e->getMessage();

        return match (true) {
            \str_contains($message, 'syntax error') =>
                new SyntaxException($message, (int)$e->getCode()),

            \str_contains($message, 'unable to open database file') =>
                new ConnectionException($message, (int)$e->getCode()),

            default => new DatabaseException($e->getMessage()),
        };
    }
}
