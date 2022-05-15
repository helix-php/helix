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

final class SystemClock implements ClockInterface
{
    /**
     * @var non-empty-string
     */
    private const DEFAULT_TIMEZONE = 'UTC';

    /**
     * @var non-empty-string
     */
    private const DATE_NOW = 'now';

    /**
     * @var \DateTimeZone
     */
    private \DateTimeZone $timezone;

    /**
     * @param non-empty-string $timezone
     * @param non-empty-string $now
     */
    public function __construct(
        string $timezone = self::DEFAULT_TIMEZONE,
        private readonly string $now = self::DATE_NOW,
    ) {
        $this->timezone = new \DateTimeZone($timezone);
    }

    /**
     * {@inheritDoc}
     */
    public function now(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->now, $this->timezone);
    }
}
