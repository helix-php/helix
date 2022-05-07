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
final class Info implements ClassMetadataInterface
{
    /**
     * @param string|null $name
     * @param string|null $description
     * @param string|null $version
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $description = null,
        public readonly ?string $version = null,
    ) {}
}
