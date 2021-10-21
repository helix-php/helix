<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO;

use Helix\Contracts\Database\ResultInterface;

/**
 * @psalm-type ExecutionMode = Result::EXEC_MODE_*
 */
class Result implements ResultInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_ALREADY_EXECUTED =
        'Can not fetch the value because the query ' .
        'result has already been received'
    ;

    /**
     * @var non-empty-string
     */
    private const ERROR_MODE_ITERATOR =
        'Can not fetch the new value because the query ' .
        'result has already been received as an iterator'
    ;

    /**
     * @var non-empty-string
     */
    private const ERROR_MODE_SCALAR =
        'Can not fetch the new value because the query ' .
        'result has already been received as scalar value'
    ;

    /**
     * @var ExecutionMode
     */
    private const EXEC_MODE_PREPARED = 0b0000;

    /**
     * @var ExecutionMode
     */
    private const EXEC_MODE_EXECUTED = 0b0010;

    /**
     * @var ExecutionMode
     */
    private const EXEC_MODE_SCALAR = 0b0100;

    /**
     * @var ExecutionMode
     */
    private const EXEC_MODE_ITERATOR = 0b1000;

    /**
     * @var int-mask-of<ExecutionMode>
     */
    private int $mode = self::EXEC_MODE_PREPARED;

    /**
     * @var \PDOStatement|null
     */
    private ?\PDOStatement $stmt;

    /**
     * @var positive-int|0
     */
    private int $count = 0;

    /**
     * @param \PDOStatement $stmt
     */
    public function __construct(\PDOStatement $stmt)
    {
        $this->stmt = $stmt;
        $this->stmt->setFetchMode(\PDO::FETCH_ASSOC);
    }

    /**
     * {@inheritDoc}
     * @psalm-suppress PropertyTypeCoercion
     */
    public function getIterator(): \Traversable
    {
        if (($this->mode & self::EXEC_MODE_EXECUTED) === self::EXEC_MODE_EXECUTED) {
            throw new \LogicException(self::ERROR_ALREADY_EXECUTED);
        }

        if (($this->mode & self::EXEC_MODE_SCALAR) === self::EXEC_MODE_SCALAR) {
            throw new \LogicException(self::ERROR_MODE_SCALAR);
        }

        $this->mode = self::EXEC_MODE_EXECUTED | self::EXEC_MODE_ITERATOR;
        $this->count = $this->stmt->rowCount();

        /** @psalm-suppress MixedAssignment */
        while ($result = $this->stmt->fetch()) {
            yield $result;
        }

        $this->stmt = null;
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        if ($this->stmt !== null) {
            /** @psalm-suppress PropertyTypeCoercion */
            return $this->count = $this->stmt->rowCount();
        }

        return $this->count;
    }

    /**
     * {@inheritDoc}
     * @psalm-suppress MixedReturnStatement
     * @psalm-suppress MixedInferredReturnType
     * @psalm-suppress PropertyTypeCoercion
     */
    public function get(int $column = 0): mixed
    {
        \assert($column >= 0);

        if (($this->mode & self::EXEC_MODE_EXECUTED) === self::EXEC_MODE_EXECUTED) {
            throw new \LogicException(self::ERROR_ALREADY_EXECUTED);
        }

        if (($this->mode & self::EXEC_MODE_ITERATOR) === self::EXEC_MODE_ITERATOR) {
            throw new \LogicException(self::ERROR_MODE_ITERATOR);
        }

        $this->mode = self::EXEC_MODE_EXECUTED | self::EXEC_MODE_SCALAR;
        /** @psalm-suppress PossiblyNullReference */
        $this->count = $this->stmt->rowCount();

        /** @psalm-suppress MixedAssignment */
        $result = $this->stmt->fetchColumn($column);
        $this->stmt = null;

        return $result;
    }
}
