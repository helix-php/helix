<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO;

use Helix\Async\Task;
use Helix\Contracts\Database\Query\ExecutableQueryInterface;
use Helix\Contracts\Database\QueryInterface;
use Helix\Contracts\Database\ResultInterface;
use Helix\Database\ExceptionConverterInterface;
use Helix\Database\PDO\Exception\DatabaseException as PDODatabaseException;
use Helix\Database\Exception\DatabaseException;
use Helix\Database\Query;
use JetBrains\PhpStorm\Language;

/**
 * @psalm-import-type ParamKey from QueryInterface
 * @psalm-import-type ParamValue from QueryInterface
 * @see QueryInterface
 */
class ExecutableQuery extends Query implements ExecutableQueryInterface
{
    /**
     * @psalm-taint-sink sql $query
     * @param \PDO $pdo
     * @param ExceptionConverterInterface $converter
     * @param non-empty-string $query
     * @param iterable<ParamKey, ParamValue> $params
     */
    public function __construct(
        private readonly \PDO $pdo,
        private readonly ExceptionConverterInterface $converter,
        #[Language('SQL')] string $query,
        iterable $params = []
    ) {
        parent::__construct($query, $params);
    }

    /**
     * {@inheritDoc}
     * @throws DatabaseException
     */
    public function execute(iterable $params = []): ResultInterface
    {
        /**
         * @psalm-suppress MixedReturnStatement
         * @psalm-suppress InvalidArgument
         */
        return Task::run(function () use ($params): \Generator {
            yield $stmt = $this->prepare();
            yield $stmt->execute($this->getParams($params));

            return new Result($stmt);
        });
    }

    /**
     * @param iterable<ParamKey, ParamValue> $params
     * @return array<ParamKey, ParamValue>
     * @psalm-suppress MismatchingDocblockReturnType
     * @psalm-suppress InvalidReturnType
     */
    private function getParams(iterable $params): array
    {
        $result = \array_merge([...$params], $this->params);
        \ksort($result);

        return $result;
    }

    /**
     * @return \PDOStatement
     * @throws DatabaseException
     */
    private function prepare(): \PDOStatement
    {
        try {
            $stmt = $this->pdo->prepare($this->query);
        } catch (\PDOException $e) {
            throw $this->converter->exception(PDODatabaseException::fromPDO($e), $this);
        }

        if ($stmt === false) {
            $exception = PDODatabaseException::fromErrorInfo($this->pdo->errorInfo());

            throw $this->converter->exception($exception, $this);
        }

        return $stmt;
    }
}
