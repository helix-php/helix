<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO\SQLite;

final class MemoryConnectionInfo extends ConnectionInfo
{
    /**
     * @return non-empty-string
     */
    public function getDsn(): string
    {
        $config = ['path' => ':memory:'];

        return \sprintf('%s:%s', $this->getDriverName(), $this->dsn($config));
    }
}
