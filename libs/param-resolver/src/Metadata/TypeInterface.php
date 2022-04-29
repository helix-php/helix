<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata;

interface TypeInterface
{
    /**
     * @return bool
     */
    public function isNullable(): bool;

    /**
     * @param non-empty-string $name
     * @return bool
     */
    public function is(string $name): bool;
}
