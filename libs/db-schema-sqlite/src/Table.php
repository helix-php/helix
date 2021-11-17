<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Schema\SQLite;

use Helix\Database\Schema\ColumnInterface;
use Helix\Database\Schema\Table as BaseTable;

class Table extends BaseTable
{
    /**
     * {@inheritDoc}
     */
    public function column(string $name): ColumnInterface
    {
        return new Column($this->db, $this, $name);
    }

    /**
     * {@inheritDoc}
     */
    public function columns(): iterable
    {
        $query = $this->db->execute("PRAGMA table_info('$this->name')");

        foreach ($query as [
            'name' => $name,
            'type' => $type,
            'dflt_value' => $default,
            'notnull' => $isNotNull,
            'pk' => $isPrimary
        ]) {
            yield new Column(
                db: $this->db,
                table: $this,
                name: $name,
                type: $type,
                isNotNull: (bool)$isNotNull
            );
        }
    }
}
