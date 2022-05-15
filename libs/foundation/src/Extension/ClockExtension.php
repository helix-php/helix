<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Extension;

use Helix\Boot\Attribute\Singleton;
use Helix\Clock\SystemClock;
use Psr\Clock\ClockInterface;

final class ClockExtension
{
    #[Singleton]
    public function getClock(): ClockInterface
    {
        return new SystemClock($this->getSystemTimeZoneString());
    }

    /**
     * @return non-empty-string
     */
    private function getSystemTimeZoneString(): string
    {
        if ($timezone = \ini_get('date.timezone')) {
            return $timezone;
        }

        if ($timezone = \date_default_timezone_get()) {
            return $timezone;
        }

        return 'UTC';
    }
}
