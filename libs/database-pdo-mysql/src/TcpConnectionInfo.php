<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO\MySQL;

final class TcpConnectionInfo extends ConnectionInfo
{
    /**
     * @param non-empty-string $host
     * @param positive-int $port
     * @param non-empty-string|null $database
     * @param non-empty-string|null $charset
     *
     * {@inheritDoc}
     */
    public function __construct(
        public readonly string $host = '127.0.0.1',
        public readonly int $port = 3306,
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
            'host'    => $this->host,
            'port'    => $this->port,
            'dbname'  => $this->database,
            'charset' => $this->charset,
        ];

        return \sprintf('%s:%s', $this->getDriverName(), $this->dsn($config));
    }
}
