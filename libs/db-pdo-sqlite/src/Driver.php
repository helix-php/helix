<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO\SQLite;

use Helix\Contracts\Database\QueryInterface;
use Helix\Database\Exception\ConnectionException;
use Helix\Database\Exception\SyntaxErrorException;
use Helix\Database\PDO\Driver as BaseDriver;
use Helix\Database\Exception\DatabaseException;

/**
 * @property-read ConnectionInfo $info
 */
final class Driver extends BaseDriver
{
    /**
     * @param ConnectionInfo $info
     */
    public function __construct(ConnectionInfo $info = new MemoryConnectionInfo())
    {
        parent::__construct($info);
    }

    /**
     * {@inheritDoc}
     */
    public function connect(): Connection
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
                username: null,
                password: null,
                options: $this->getOptions(),
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
    public function exception(\Throwable $e, QueryInterface $query = null): DatabaseException
    {
        $e = parent::exception($e, $query);

        $message = $e->getMessage();

        return match (true) {
            \str_contains($message, 'syntax error') =>
                SyntaxErrorException::create($message, (int)$e->getCode(), $query),

            \str_contains($message, 'unable to open database file') =>
                new ConnectionException($message, (int)$e->getCode()),

            default => $e,
        };
    }
}
