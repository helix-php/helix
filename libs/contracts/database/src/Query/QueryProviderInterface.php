<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Database\Query;

use Helix\Contracts\Database\QueryInterface;
use JetBrains\PhpStorm\Language;

/**
 * @psalm-import-type ParamKey from QueryInterface
 * @psalm-import-type ParamValue from QueryInterface
 */
interface QueryProviderInterface
{
    /**
     * @psalm-taint-sink sql $query
     * @param non-empty-string $query
     * @param iterable<ParamKey, ParamValue> $params
     * @return QueryInterface
     */
    public function query(#[Language('SQL')] string $query, iterable $params = []): QueryInterface;
}
