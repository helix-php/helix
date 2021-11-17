<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO\SQLite;

final class FileConnectionInfo extends ConnectionInfo
{
    /**
     * @param string $path The pathname to the SQLite database file.
     *        - In case of keyword ":memory:" {@see MemoryConnectionInfo}.
     *        - In case of empty string value {@see TempFileConnectionInfo}.
     */
    public function __construct(
        public readonly string $path
    ) {
    }

    /**
     * @return non-empty-string
     */
    public function getDsn(): string
    {
        return \sprintf('%s:%s', $this->getDriverName(), $this->dsn([$this->path]));
    }
}
