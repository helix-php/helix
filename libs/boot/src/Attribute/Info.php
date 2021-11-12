<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot\Attribute;

#[\Attribute(\Attribute::TARGET_CLASS)]
final class Info extends ClassMetadata
{
    /**
     * @param string $name
     * @param string $description
     * @param string $version
     */
    public function __construct(
        public readonly string $name,
        public readonly string $description = '',
        public readonly string $version = '1.0.0',
    ) {}
}
