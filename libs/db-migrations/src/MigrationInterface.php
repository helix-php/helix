<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Migrations;

use Helix\Database\Manager\DriverManagerInterface;

interface MigrationInterface
{
    /**
     * Returns connection's name defined in {@see DriverManagerInterface}.
     *
     * @return non-empty-string|null
     */
    public function getConnection(): ?string;

    /**
     * @return void
     */
    public function up(): void;

    /**
     * @return void
     */
    public function down(): void;
}
