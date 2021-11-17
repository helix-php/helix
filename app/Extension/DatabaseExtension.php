<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Extension;

use Helix\Boot\Attribute\Singleton;
use Helix\Contracts\Database\ConnectionInterface;
use Helix\Contracts\Database\DriverInterface;
use Helix\Database;
use Helix\Database\Manager\DriverManager;
use Helix\Database\Manager\DriverManagerInterface;

final class DatabaseExtension
{
    /**
     * @return DriverManagerInterface
     */
    #[Singleton]
    public function getManager(): DriverManagerInterface
    {
        return new DriverManager(drivers: [
            'default' => new Database\PDO\SQLite\Driver(
                info: new Database\PDO\SQLite\MemoryConnectionInfo()
            )
        ]);
    }

    /**
     * @param DriverManagerInterface $manager
     * @return DriverInterface
     */
    #[Singleton]
    public function getDriver(DriverManagerInterface $manager): DriverInterface
    {
        return $manager->get();
    }

    /**
     * @param DriverInterface $driver
     * @return ConnectionInterface
     */
    #[Singleton]
    public function getConnection(DriverInterface $driver): ConnectionInterface
    {
        return $driver->connect();
    }
}
