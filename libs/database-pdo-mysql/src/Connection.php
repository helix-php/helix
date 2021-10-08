<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO\MySQL;

use Helix\Database\PDO\Connection as PDOConnection;

class Connection extends PDOConnection
{
    /**
     * @return bool
     */
    public function isActive(): bool
    {
        try {
            $this->pdo->getAttribute(\PDO::ATTR_SERVER_INFO);
            return true;
        } catch (\Throwable) {
            return false;
        }
    }
}
