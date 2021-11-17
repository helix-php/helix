<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Migrations;

use Helix\Contracts\Database\ConnectionInterface;
use Helix\Contracts\Database\Driver\ConnectorInterface;
use Helix\Contracts\Database\DriverInterface;
use Helix\Manager\Exception\ManagerException;

class Migrator
{
    /**
     * @var \WeakMap<DriverInterface, ConnectionInterface>
     */
    private \WeakMap $connections;

    /**
     * @param MigratorCreateInfo $info
     */
    public function __construct(
        public readonly MigratorCreateInfo $info,
    ) {
        $this->connections = new \WeakMap();
    }

    public function up(): void
    {
        foreach ($this->info->repository as $name => $migration) {
            $driver = $this->getDriverForMigration($migration);
            $connection = $this->getConnectionByDriver($driver);

            var_dump($name, $driver, $connection);
        }
    }

    /**
     * @param DriverInterface $driver
     * @return ConnectionInterface
     */
    private function getConnectionByDriver(DriverInterface $driver): ConnectionInterface
    {
        if (isset($this->connections[$driver])) {
            /** @var ConnectionInterface $connection */
            $connection = $this->connections[$driver];

            if ($connection->isActive()) {
                return $connection;
            }
        }

        return $this->connections[$driver] = $driver->connect();
    }

    /**
     * @param MigrationInterface $migration
     * @return DriverInterface
     * @throws ManagerException
     */
    private function getDriverForMigration(MigrationInterface $migration): DriverInterface
    {
        return $this->info->database->get($migration->getConnection());
    }
}
