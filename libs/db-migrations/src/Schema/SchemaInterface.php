<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Migrations\Schema;

interface SchemaInterface
{
    public function create(string $table);
    public function drop(string $table);
}
