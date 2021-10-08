<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO;

use Helix\Database\Driver\ExceptionConverterInterface;
use Helix\Database\Exception\DatabaseException;
use Helix\Database\QueryInterface;

class Query implements QueryInterface
{
    /**
     * @var bool
     */
    private bool $executed = false;

    /**
     * @param ExceptionConverterInterface $converter
     * @param \PDOStatement $stmt
     * @param array $params
     */
    public function __construct(
        private ExceptionConverterInterface $converter,
        private \PDOStatement $stmt,
        private array $params = []
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function with(int|string $param, mixed $value): QueryInterface
    {
        $self = clone $this;
        $self->params[$param] = $value;

        return $self;
    }

    /**
     * @return iterable
     * @throws DatabaseException
     */
    public function fetchAll(): iterable
    {
        return $this->getIterator();
    }

    /**
     * @return \Traversable
     * @throws DatabaseException
     */
    public function getIterator(): \Traversable
    {
        $this->execute();

        while ($result = $this->stmt->fetch(\PDO::FETCH_ASSOC)) {
            yield $result;
        }
    }

    /**
     * @return void
     * @throws DatabaseException
     */
    public function execute(): void
    {
        try {
            $this->stmt->execute($this->params);
        } catch (\PDOException $e) {
            throw $this->converter->exception($e);
        }
    }

    /**
     * @param int $column
     * @return mixed
     * @throws DatabaseException
     */
    public function getValue(int $column = 0): mixed
    {
        $this->execute();

        return $this->stmt->fetchColumn($column);
    }

    /**
     * {@inheritDoc}
     * @throws DatabaseException
     */
    public function count(): int
    {
        $this->executeIfNotExecuted();

        return $this->stmt->rowCount();
    }

    /**
     * @return void
     * @throws DatabaseException
     */
    private function executeIfNotExecuted(): void
    {
        if ($this->executed === false) {
            $this->execute();
            $this->executed = true;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->stmt->queryString;
    }
}
