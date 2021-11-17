<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Database\Driver;

use Helix\Contracts\Database\ConnectionInterface;

interface ConnectorInterface
{
    /**
     * Creates a new connection.
     *
     * It helps with establishing a TCP, UNIX Socket or other variants of
     * connection to your database and issuing the initial authentication
     * handshake.
     *
     * ```php
     * $connection = $connector->connect();
     * ```
     *
     * @return ConnectionInterface
     */
    public function connect(): ConnectionInterface;
}
