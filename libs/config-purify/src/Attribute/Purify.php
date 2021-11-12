<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Purify\Attribute;

use Helix\Config\Purify\Purifier;

#[\Attribute(\Attribute::TARGET_CLASS)]
final class Purify
{
    /**
     * @var array<non-empty-string>
     */
    public readonly array $fields;

    /**
     * @param non-empty-string|array<non-empty-string> $field
     * @param non-empty-string $replacement
     */
    public function __construct(
        array|string $field = [],
        public readonly string $replacement = Purifier::DEFAULT_REPLACEMENT,
    ) {
        $this->fields = (array)$field;
    }
}
