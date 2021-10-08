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
use Helix\Database\ConnectionInterface;
use Helix\Database\DriverInterface;
use Helix\Database\PDO\SQLite\Driver;
use Helix\Database\PDO\SQLite\FileConnectionInfo;
use Helix\Foundation\Path;

class DatabaseExtension
{
    #[Singleton]
    public function getConnection(DriverInterface $driver): ConnectionInterface
    {
        return $driver->connect();
    }

    #[Singleton]
    public function getDriver(Path $path): DriverInterface
    {
        return new Driver(
            new FileConnectionInfo(
                path: $path->storage('database.sqlite')
            )
        );
    }
}
