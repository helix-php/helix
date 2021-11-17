<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO\SQLite;

use Helix\Database\PDO\ConnectionInfo as PDOConnectionInfo;

abstract class ConnectionInfo extends PDOConnectionInfo
{
    /**
     * {@inheritDoc}
     */
    public function getDriverName(): string
    {
        return 'sqlite';
    }
}
