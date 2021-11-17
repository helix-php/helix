<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\PDO;

use Helix\Contracts\Database\QueryInterface;
use Helix\Database\Driver as BaseDriver;
use Helix\Database\Exception\DatabaseException;
use Helix\Database\PDO\Exception\DatabaseException as PDODatabaseException;

/**
 * @psalm-type PDOAttr = \PDO::ATTR_*
 */
abstract class Driver extends BaseDriver
{
    /**
     * @param ConnectionInfo $info
     */
    public function __construct(ConnectionInfo $info)
    {
       parent::__construct($info);
    }

    /**
     * @param array<PDOAttr, scalar> $options
     * @return array<PDOAttr, scalar>
     */
    protected function getOptions(array $options = []): array
    {
        $default = \iterator_to_array($this->getDefaultOptions());

        return \array_merge($options, $default);
    }

    /**
     * @return iterable<PDOAttr, scalar>
     */
    protected function getDefaultOptions(): iterable
    {
        yield \PDO::ATTR_CASE => \PDO::CASE_UPPER;
        yield \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION;
        yield \PDO::ATTR_EMULATE_PREPARES => false;
        yield \PDO::ATTR_STRINGIFY_FETCHES => false;
    }

    /**
     * @param \Throwable $e
     * @param QueryInterface|null $query
     * @return DatabaseException
     */
    public function exception(\Throwable $e, QueryInterface $query = null): DatabaseException
    {
        if ($e instanceof \PDOException) {
            return PDODatabaseException::fromPDO($e);
        }

        return new DatabaseException($e->getMessage(), (int)$e->getCode());
    }
}
