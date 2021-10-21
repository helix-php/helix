<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config;

use Helix\Config\Reader\PhpReader;
use Helix\Config\Reader\ReaderInterface;
use Helix\Config\Reader\ExtendableInterface;
use Helix\Contracts\Config\RepositoryInterface;
use Helix\Contracts\Memoizable\MemoizableInterface;

class Config implements RepositoryInterface, MemoizableInterface, ExtendableInterface
{
    /**
     * @var array<string, ReaderInterface>
     */
    private array $readers = [];

    /**
     * @var array<non-empty-string>
     */
    private array $directories = [];

    /**
     * @var array<non-empty-string, mixed>
     */
    private array $loaded = [];

    /**
     * @param iterable<non-empty-string> $directories
     */
    public function __construct(iterable $directories)
    {
        $this->bootDirectories($directories);
        $this->bootDefaultReaders();
    }

    /**
     * @param iterable<non-empty-string> $directories
     * @return void
     */
    private function bootDirectories(iterable $directories): void
    {
        foreach ($directories as $directory) {
            $this->directories[] = \realpath($directory) ?: $directory;
        }
    }

    /**
     * @return void
     */
    private function bootDefaultReaders(): void
    {
        $this->readers['php'] = new PhpReader();
    }

    /**
     * @param non-empty-string $extension
     * @param ReaderInterface $reader
     * @return $this
     */
    public function extend(string $extension, ReaderInterface $reader): self
    {
        $this->readers[\ltrim($extension, '.')] = $reader;
        $this->free();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function free(): void
    {
        $this->loaded = [];
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $section, mixed $default = null): mixed
    {
        if (!\array_key_exists($section, $this->loaded)) {
            $result = $this->lookup($section);

            if ($result === null) {
                return $default;
            }

            [$reader, $pathname] = $result;

            /** @psalm-suppress PropertyTypeCoercion */
            $this->loaded[$section] = $reader->read($pathname);
        }

        return $this->loaded[$section];
    }

    /**
     * @param non-empty-string $section
     * @return array{ ReaderInterface, non-empty-string }|null
     */
    private function lookup(string $section): ?array
    {
        foreach ($this->directories as $directory) {
            foreach ($this->readers as $ext => $reader) {
                $pathname = $directory . \DIRECTORY_SEPARATOR . $section . '.' . $ext;

                if (\is_file($pathname)) {
                    return [$reader, $pathname];
                }
            }
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function has(string $section): bool
    {
        if (\array_key_exists($section, $this->loaded)) {
            return true;
        }

        return $this->lookup($section) !== null;
    }
}
