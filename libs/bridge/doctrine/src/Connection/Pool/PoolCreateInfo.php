<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\Connection\Pool;

final class PoolCreateInfo
{
    /**
     * @param int $max
     * @param PollerType $poller
     */
    public function __construct(
        public readonly int $max = 1024,
        public readonly PollerType $poller = PollerType::SINGLE_READ_UNIQUE_WRITE,
    ) {
    }
}
