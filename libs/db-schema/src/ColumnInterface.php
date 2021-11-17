<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Schema;

interface ColumnInterface
{
    /**
     * @return non-empty-string
     */
    public function getName(): string;

    /**
     * @return TableInterface
     */
    public function getTable(): TableInterface;

    /**
     * @return non-empty-string
     */
    public function getType(): string;

    /**
     * @return bool
     */
    public function isNotNull(): bool;

    /**
     * @return bool
     */
    public function exists(): bool;
}
