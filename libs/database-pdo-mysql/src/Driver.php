<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO\MySQL;

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
    public function __construct(private ConnectionInfo $info)
    {
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
            $options = $this->info->options;
            $options[\PDO::ATTR_PERSISTENT] = $this->info->persistent;

            return new \PDO(
                dsn: $this->info->getDsn(),
                username: $this->info->user,
                password: $this->info->password,
                options: $options,
            );
        } catch (\PDOException $e) {
            throw $this->exception($e);
        }
    }

    /**
     * @link https://dev.mysql.com/doc/mysql-errors/8.0/en/client-error-reference.html
     * @link https://dev.mysql.com/doc/mysql-errors/8.0/en/server-error-reference.html
     * @link https://github.com/doctrine/dbal/blob/4.0.x/src/Driver/API/MySQL/ExceptionConverter.php
     *
     * {@inheritDoc}
     */
    public function exception(\Throwable $e, string $sql = null): DatabaseException
    {
        if ($e instanceof \PDOException) {
            $e = PDODatabaseException::create($e);
        }

        $code = (int)$e->getCode();

        return match ($code) {
            // 1213 Deadlock
            // 1205 Lock Wait Timeout
            // 1050 Table Exists
            // 1051, 1146 Table Not Found
            // 1216, 1217, 1451, 1452, 1701 Foreign Key Constraint Violation
            // 1062, 1557, 1569, 1586 Unique Constraint Violation
            // 1054, 1166, 1611 Invalid Field Name
            // 1052, 1060, 1110 Non Unique Field Name
            // 1048, 1121, 1138, 1171, 1252, 1263, 1364, 1566 Not Null Constraint Violation

            1064, 1149, 1287, 1341,
            1342, 1343, 1344, 1382,
            1479, 1541, 1554, 1626 => new SyntaxException($e->getMessage(), $code),

            // Connection Exception
            1044, 1045, 1046, 1049,
            1095, 1142, 1143, 1227,
            1370, 1429, 2002, 2005,
                // Connection Lost
            2006 => new ConnectionException($e->getMessage(), $code),

            default => new DatabaseException($e->getMessage()),
        };
    }
}
