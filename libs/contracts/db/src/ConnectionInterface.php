<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Database;

use Helix\Contracts\Database\Connection\QuoterInterface;
use Helix\Contracts\Database\Query\ExecutableQueryInterface;
use Helix\Contracts\Database\Query\QueryProviderInterface;
use Helix\Contracts\Database\Transaction\TransactionProviderInterface;
use JetBrains\PhpStorm\Language;

/**
 * @psalm-import-type ParamKey from QueryInterface
 * @psalm-import-type ParamValue from QueryInterface
 */
interface ConnectionInterface extends
    QuoterInterface,
    QueryProviderInterface,
    TransactionProviderInterface
{
    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * {@inheritDoc}
     */
    public function query(#[Language('SQL')] string $query, iterable $params = []): ExecutableQueryInterface;

    /**
     * @psalm-taint-sink sql $query
     * @param QueryInterface|non-empty-string $query
     * @param iterable<ParamKey, ParamValue> $params
     * @return ResultInterface
     */
    public function execute(#[Language('SQL')] QueryInterface|string $query, iterable $params = []): ResultInterface;

    /**
     * @param non-empty-string|null $column
     * @return non-empty-string|positive-int|null
     */
    public function lastInsertId(string $column = null): string|int|null;
}
