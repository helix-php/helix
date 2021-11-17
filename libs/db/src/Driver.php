<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database;

use Helix\Contracts\Database\DriverInterface;
use Helix\Contracts\Database\QueryInterface;
use Helix\Database\Exception\DatabaseException;

abstract class Driver implements DriverInterface, ExceptionConverterInterface
{
    /**
     * @param ConnectionInfo $info
     */
    public function __construct(
        public readonly ConnectionInfo $info
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function exception(\Throwable $e, QueryInterface $query = null): DatabaseException
    {
        return new DatabaseException($e->getMessage(), (int)$e->getCode(), $e);
    }
}
