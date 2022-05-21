<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Mime;

use Helix\Contracts\Mime\CategoryInterface;

#[\Attribute(\Attribute::TARGET_CLASS_CONSTANT)]
final class Info
{
    /**
     * @param non-empty-string $name
     * @param CategoryInterface $category
     */
    public function __construct(
        public readonly string $name,
        public readonly CategoryInterface $category,
    ) {
    }
}
