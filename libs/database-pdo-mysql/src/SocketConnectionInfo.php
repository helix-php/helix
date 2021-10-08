<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO\MySQL;

final class SocketConnectionInfo extends ConnectionInfo
{
    /**
     * @param non-empty-string $socket
     * @param non-empty-string|null $database
     * @param non-empty-string|null $charset
     *
     * {@inheritDoc}
     */
    public function __construct(
        public readonly string $socket,
        ?string $database = null,
        ?string $charset = null,
        ?bool $persistent = false,
        ?string $user = null,
        ?string $password = null,
        array $options = []
    ) {
        parent::__construct(
            database: $database,
            charset: $charset,
            persistent: $persistent,
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
        $config = [
            'unix_socket' => $this->socket,
            'dbname'      => $this->database,
            'charset'     => $this->charset,
        ];

        return \sprintf('%s:%s', $this->getDriverName(), $this->dsn($config));
    }
}
