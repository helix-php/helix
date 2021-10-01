<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot\Extension;

interface StatusInterface
{
    /**
     * @return string
     */
    public function toString(): string;

    /**
     * @return bool
     */
    public function isStable(): bool;

    /**
     * @return bool
     */
    public function isDeprecated(): bool;
}
