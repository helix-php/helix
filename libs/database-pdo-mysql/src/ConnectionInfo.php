<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO\MySQL;

use Helix\Database\PDO\ConnectionInfo as PDOConnectionInfo;

abstract class ConnectionInfo extends PDOConnectionInfo
{
    /**
     * {@inheritDoc}
     */
    public function __construct(
        public readonly ?string $database = null,
        public readonly ?string $charset = null,
        public readonly ?bool $persistent = false,
        ?string $user = null,
        ?string $password = null,
        array $options = []
    ) {
        parent::__construct($user, $password, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function getDriverName(): string
    {
        return 'mysql';
    }
}
