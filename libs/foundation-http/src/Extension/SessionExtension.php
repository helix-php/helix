<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Http\Extension;

use Helix\Boot\Attribute\Singleton;
use Helix\Foundation\Path;
use Helix\Session\Handler\FileSessionHandler;
use Helix\Session\ManagerInterface;
use Helix\Session\WeakManager;
use Psr\Clock\ClockInterface;

final class SessionExtension
{
    #[Singleton]
    public function getSessionManager(): ManagerInterface
    {
        return new WeakManager();
    }

    #[Singleton]
    public function getSession(Path $path, ?ClockInterface $clock): \SessionHandlerInterface
    {
        return new FileSessionHandler(
            path: $path->storage('sessions'),
            lifetime: $this->getSessionLifetime(),
            clock: $clock,
        );
    }

    /**
     * @return positive-int
     */
    private function getSessionLifetime(): int
    {
        if ($lifetime = \ini_get('session.gc_maxlifetime')) {
            return (int)$lifetime;
        }

        return 86400;
    }
}
