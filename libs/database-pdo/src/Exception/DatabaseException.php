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
    public static function create(\PDOException $e): self
    {
        [$state, $code] = $e->errorInfo === null
            ? [null, $e->getCode()]
            : $e->errorInfo;

        $instance = new self($e->getMessage(), $code, $e);
        $instance->state = $state;

        return $instance;
    }
}
