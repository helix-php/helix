<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Psr\Clock;

if (!\interface_exists(ClockInterface::class)) {
    /**
     * Please note that this interface currently emulates the behavior of the
     * PSR-20 implementation and may be replaced by the `psr/clock`
     * implementation in future versions.
     */
    interface ClockInterface
    {
        /**
         * Returns the current time as a DateTimeImmutable Object
         */
        public function now(): \DateTimeImmutable;
    }
}
