<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Header;

/**
 * @mixin ProvidesAdditionalAttributesInterface
 * @psalm-require-implements ProvidesAdditionalAttributesInterface
 */
trait ProvidesAdditionalAttributesTrait
{
    /**
     * @var array<non-empty-string, non-empty-string|int>
     */
    protected array $attributes = [];

    /**
     * @return array<non-empty-string, non-empty-string|int>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
