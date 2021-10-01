<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Attribute;

use Helix\Boot\Attribute\ClassMetadata;

#[\Attribute(\Attribute::IS_REPEATABLE | \Attribute::TARGET_CLASS)]
final class ProvidesConfig extends ClassMetadata
{
    /**
     * @param non-empty-string $name
     * @param class-string $class
     */
    public function __construct(
        public readonly string $name,
        public readonly string $class,
    ) {}
}
