<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata\Type;

class UnionType extends Composite
{
    /**
     * @param non-empty-string $name
     * @param non-empty-string ...$names
     * @return bool
     */
    public function isNullableOf(string $name, string ...$names): bool
    {
        return $this->is('null', $name, ...$names);
    }
}
