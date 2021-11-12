<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO\Exception;

use Helix\Database\Exception\DatabaseException as BaseDatabaseException;

class DatabaseException extends BaseDatabaseException
{
    /**
     * @var int|string|null
     */
    public int|string|null $state = null;

    /**
     * @param \PDOException $e
     * @return self
     */
    public static function fromPDO(\PDOException $e): self
    {
        if (\is_array($e->errorInfo)) {
            return self::fromErrorInfo($e->errorInfo);
        }

        return new self($e->getMessage(), 0, $e);
    }

    /**
     * @param array $info
     * @return static
     */
    public static function fromErrorInfo(array $info): self
    {
        [$state, $code, $message] = self::normalizeInfo($info);

        $exception = new self($message, $code);
        $exception->state = $state;

        return $exception;
    }

    /**
     * @param array $info
     * @return array{0: string|null, 1: int, 2: string}
     */
    private static function normalizeInfo(array $info): array
    {
        return [
            (string)($info[0] ?? null),
            (int)($info[1] ?? 0),
            (string)($info[2] ?? 'Unrecognized database error'),
        ];
    }
}
