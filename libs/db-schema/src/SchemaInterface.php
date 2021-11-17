<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Schema;

interface SchemaInterface
{
    /**
     * Returns table by name.
     *
     * @param non-empty-string $name
     * @return TableInterface
     */
    public function table(string $name): TableInterface;

    /**
     * @return iterable<TableInterface>
     */
    public function tables(): iterable;
}
