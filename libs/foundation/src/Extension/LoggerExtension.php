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
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class LoggerExtension
{
    #[Singleton]
    public function getLogger(): LoggerInterface
    {
        return new NullLogger();
    }
}
