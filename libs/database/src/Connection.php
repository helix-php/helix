<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database;

use Helix\Contracts\Database\ConnectionInterface;
use Helix\Contracts\Database\Query\ExecutableQueryInterface;
use Helix\Contracts\Database\QueryInterface;
use Helix\Contracts\Database\ResultInterface;
use JetBrains\PhpStorm\Language;

abstract class Connection implements ConnectionInterface
{
    /**
     * Converts query to executable connection-aware query
     *
     * @param QueryInterface $query
     * @return ExecutableQueryInterface
     */
    protected function queryToExecutable(QueryInterface $query): ExecutableQueryInterface
    {
        return $this->query((string)$query, \iterator_to_array($query));
    }

    /**
     * {@inheritDoc}
     */
    public function execute(#[Language('SQL')] string|QueryInterface $query, iterable $params = []): ResultInterface
    {
        if (\is_string($query)) {
            $query = $this->query($query);
        }

        if (! $query instanceof ExecutableQueryInterface) {
            $query = $this->queryToExecutable($query);
        }

        return $query->execute($params);
    }
}
