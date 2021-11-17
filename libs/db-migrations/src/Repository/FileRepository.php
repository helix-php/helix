<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Migrations\Repository;

use Helix\Contracts\Memoizable\MemoizableInterface;
use Helix\Database\Migrations\Exception\LoadingException;
use Helix\Database\Migrations\Exception\DirectoryNotFoundException;
use Helix\Database\Migrations\Exception\MigrationException;
use Helix\Database\Migrations\MigrationInterface;

final class FileRepository implements RepositoryInterface, MemoizableInterface
{
    /**
     * @var string
     */
    private const ERROR_INTERFACE = 'Could not load migration from "%s": '
                                  . 'Migration must implement interface %s';

    /**
     * @psalm-type IteratorFlags = \FilesystemIterator::*
     * @psalm-var IteratorFlags
     */
    private const ITERATOR_FLAGS = \FilesystemIterator::CURRENT_AS_FILEINFO
                                 | \FilesystemIterator::SKIP_DOTS
                                 | \FilesystemIterator::UNIX_PATHS
                                 ;

    /**
     * @var array<non-empty-string>
     */
    private array $directories = [];

    /**
     * @var array<non-empty-string, MigrationInterface>|null
     */
    private ?array $migrations = null;

    /**
     * @param FileRepositoryCreateInfo $info
     * @throws DirectoryNotFoundException
     */
    public function __construct(
        FileRepositoryCreateInfo $info = new FileRepositoryCreateInfo()
    ) {
        $this->add(...$info->directories);
    }

    /**
     * @return void
     * @throws DirectoryNotFoundException
     */
    public function free(): void
    {
        $this->formatMigrationDirectories();
        $this->resetLoadedMigrations();
    }

    /**
     * @return void
     */
    private function resetLoadedMigrations(): void
    {
        $this->migrations = null;
    }

    /**
     * @return void
     * @throws DirectoryNotFoundException
     */
    private function formatMigrationDirectories(): void
    {
        foreach ($this->directories as $i => $directory) {
            if (!\is_dir($directory)) {
                throw DirectoryNotFoundException::fromDirectory($directory);
            }

            $this->directories[$i] = \realpath($directory);
        }

        $this->directories = \array_unique($this->directories);
    }

    /**
     * @param non-empty-string ...$directories
     * @return $this
     * @throws DirectoryNotFoundException
     */
    private function add(string ...$directories): self
    {
        \array_push($this->directories, ...$directories);

        $this->free();

        return $this;
    }

    /**
     * @param non-empty-string ...$directories
     * @return $this
     * @throws DirectoryNotFoundException
     */
    public function in(string ...$directories): self
    {
        return (clone $this)->add(...$directories);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): \Traversable
    {
        if ($this->migrations === null) {
            $this->migrations = [];

            try {
                foreach ($this->directories as $directory) {
                    /** @var \SplFileInfo $output */
                    foreach (new \RecursiveDirectoryIterator($directory, self::ITERATOR_FLAGS) as $file) {
                        $this->migrations[$this->nameFromFileInfo($file)] = $this->migrationFromFileInfo($file);
                    }
                }
            } catch (\Throwable $e) {
                $this->free();
                throw $e;
            }
        }

        return new \ArrayIterator($this->migrations);
    }

    /**
     * @param \SplFileInfo $info
     * @return non-empty-string
     */
    private function nameFromFileInfo(\SplFileInfo $info): string
    {
        return $info->getBasename('.php');
    }

    /**
     * @param \SplFileInfo $info
     * @return MigrationInterface
     * @throws MigrationException
     */
    private function migrationFromFileInfo(\SplFileInfo $info): MigrationInterface
    {
        try {
            $instance = require $info->getPathname();
        } catch (\Throwable $e) {
            throw LoadingException::fromPathname($info->getPathname(), $e);
        }

        if ($instance instanceof MigrationInterface) {
            return $instance;
        }

        throw new MigrationException(\vsprintf(self::ERROR_INTERFACE, [
            $info->getPathname(),
            MigrationInterface::class
        ]));
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        if ($this->migrations === null) {
            return \iterator_count($this->getIterator());
        }

        return \count($this->migrations);
    }
}
