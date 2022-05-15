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

final class FrozenClock implements ClockInterface
{
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $now;

    /**
     * @param \DateTimeInterface $now
     */
    public function __construct(\DateTimeInterface $now)
    {
        if (!$now instanceof \DateTimeImmutable) {
            $now = \DateTimeImmutable::createFromInterface($now);
        }

        $this->now = $now;
    }

    /**
     * {@inheritDoc}
     */
    public function now(): \DateTimeImmutable
    {
        return $this->now;
    }
}
