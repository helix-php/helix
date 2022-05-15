<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Session\Handler;

use Helix\Clock\SystemClock;
use Psr\Clock\ClockInterface;

final class FileSessionHandler implements \SessionHandlerInterface
{
    /**
     * @var non-empty-string
     */
    private const DEFAULT_SUFFIX = '.session';

    /**
     * @psalm-taint-sink file $path
     * @param non-empty-string $path
     * @param positive-int $lifetime
     * @param ClockInterface $clock
     * @param string $suffix
     */
    public function __construct(
        private readonly string $path,
        private readonly int $lifetime,
        private readonly ClockInterface $clock = new SystemClock(),
        private readonly string $suffix = self::DEFAULT_SUFFIX,
    ) {
    }

    /**
     * @param string $id
     * @return string
     */
    private function name(string $id): string
    {
        return $this->path . '/' . $id . $this->suffix;
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
    public function close(): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function destroy(string $id): bool
    {
        $pathname = $this->name($id);

        if (\is_file($pathname)) {
            return \unlink($pathname);
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function gc(int $max_lifetime): int|false
    {
        $iterator = new \DirectoryIterator($this->path);

        foreach ($iterator as $file) {
            dd($file);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function read(string $id): string|false
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }

    /**
     * {@inheritDoc}
     */
    public function write(string $id, string $data): bool
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }
}
