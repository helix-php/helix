<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Method;

/**
 * @internal Helix\Http\Method\Info is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Http\Method
 */
#[\Attribute(\Attribute::TARGET_CLASS_CONSTANT)]
final class Info
{
    /**
     * @param bool $safe
     * @param bool $idempotent
     */
    public function __construct(
        public readonly bool $safe = false,
        public readonly bool $idempotent = false,
    ) {
    }
}
