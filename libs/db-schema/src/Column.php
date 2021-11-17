<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Schema;

use Helix\Contracts\Database\ConnectionInterface;

abstract class Column implements ColumnInterface
{
    /**
     * @param ConnectionInterface $db
     * @param TableInterface $table
     * @param non-empty-string $name
     * @param string $type
     * @param bool $isNotNull
     */
    public function __construct(
        protected readonly ConnectionInterface $db,
        protected readonly TableInterface $table,
        protected readonly string $name,
        protected string $type,
        protected bool $isNotNull,
    ) {}

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getTable(): TableInterface
    {
        return $this->table;
    }
}
