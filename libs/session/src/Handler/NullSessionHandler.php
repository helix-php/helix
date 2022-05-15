<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Session\Handler;

final class NullSessionHandler implements \SessionHandlerInterface
{
    /**
     * {@inheritDoc}
     */
    public function close(): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function destroy(string $id): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function gc(int $max_lifetime): int|false
    {
        return 0;
    }

    /**
     * {@inheritDoc}
     */
    public function open(string $path, string $name): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function read(string $id): string|false
    {
        return '';
    }

    /**
     * {@inheritDoc}
     */
    public function write(string $id, string $data): bool
    {
        return true;
    }
}
