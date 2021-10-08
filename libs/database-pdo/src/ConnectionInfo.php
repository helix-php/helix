<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO;

use Helix\Database\ConnectionInfo as BaseConnectionInfo;

abstract class ConnectionInfo extends BaseConnectionInfo implements ProvidesDataSourceNameInterface
{
    /**
     * @return non-empty-string
     */
    abstract public function getDriverName(): string;

    /**
     * @return iterable
     */
    public function getDefaultOptions(): iterable
    {
        //
        yield \PDO::ATTR_CASE => \PDO::CASE_NATURAL;

        yield \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION;
        yield \PDO::ATTR_EMULATE_PREPARES => false;
        yield \PDO::ATTR_STRINGIFY_FETCHES => false;
    }

    /**
     * @param iterable<non-empty-string|int, mixed> $fields
     * @return string
     */
    protected function dsn(iterable $fields): string
    {
        $result = [];

        /** @psalm-suppress MixedAssignment */
        foreach ($fields as $key => $value) {
            if ($value === null) {
                continue;
            }

            $value = match (true) {
                \is_bool($value) => $value ? '1' : '0',
                \is_scalar($value), $value instanceof \Stringable => (string)$value,
                default => throw new \InvalidArgumentException(
                    \sprintf('Can not convert config value of type "%s" to string', \get_debug_type($value))
                )
            };

            $result[] = \is_string($key) ? \sprintf('%s=%s', $key, $value) : $value;
        }

        return \implode(';', $result);
    }
}
