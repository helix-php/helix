<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Clock;

use Psr\Clock\ClockInterface;
use StellaMaris\Clock\ClockInterface as StellaMarisClockInterface;

final class StellaMarisDecorator implements ClockInterface
{
    /**
     * @param StellaMarisClockInterface $clock
     */
    public function __construct(
        private readonly StellaMarisClockInterface $clock,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function now(): \DateTimeImmutable
    {
        return $this->clock->now();
    }
}
