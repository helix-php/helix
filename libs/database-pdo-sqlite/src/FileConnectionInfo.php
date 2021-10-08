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
     * @param non-empty-string $path
     * {@inheritDoc}
     */
    public function __construct(
        public string $path,
        ?string $user = null,
        ?string $password = null,
        array $options = []
    ) {
        parent::__construct(
            user: $user,
            password: $password,
            options: $options,
        );
    }

    /**
     * @return non-empty-string
     */
    public function getDsn(): string
    {
        $config = ['path' => $this->path];

        return \sprintf('%s:%s', $this->getDriverName(), $this->dsn($config));
    }
}
