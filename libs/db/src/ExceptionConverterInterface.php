<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database;

use Helix\Contracts\Database\QueryInterface;
use Helix\Database\Exception\DatabaseException;

interface ExceptionConverterInterface
{
    /**
     * @param \Throwable $e
     * @param QueryInterface|null $query
     * @return DatabaseException
     */
    public function exception(\Throwable $e, QueryInterface $query = null): DatabaseException;
}
