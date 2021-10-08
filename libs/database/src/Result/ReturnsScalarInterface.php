<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Result;

use Helix\Database\Exception\DatabaseException;

/**
 * @template TResult of scalar
 */
interface ReturnsScalarInterface
{
    /**
     * @param positive-int|0 $column
     * @return TResult
     * @throws DatabaseException
     */
    public function getValue(int $column = 0): mixed;
}
