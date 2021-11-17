<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Schema;

interface TableInterface
{
    /**
     * Returns table name.
     *
     * @return non-empty-string
     */
    public function getName(): string;

    /**
     * Returns table's schema.
     *
     * @return SchemaInterface
     */
    public function getSchema(): SchemaInterface;

    /**
     * Returns {@see true} if table exists or {@see false} instead.
     *
     * @return bool
     */
    public function exists(): bool;

    /**
     * @param non-empty-string $name
     * @return ColumnInterface
     */
    public function column(string $name): ColumnInterface;

    /**
     * @return iterable<ColumnInterface>
     */
    public function columns(): iterable;
}
