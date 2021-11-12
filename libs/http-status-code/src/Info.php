<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\StatusCode;

/**
 * @internal Helix\Http\StatusCode\Info is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Http\StatusCode
 */
#[\Attribute(\Attribute::TARGET_CLASS_CONSTANT)]
final class Info
{
    /**
     * @param string $reasonPhrase
     * @param Category $category
     */
    public function __construct(
        public readonly string $reasonPhrase = '',
        public readonly Category $category = Category::UNKNOWN,
    ) {}
}

