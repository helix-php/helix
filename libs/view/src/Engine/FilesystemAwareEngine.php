<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View\Engine;

abstract class FilesystemAwareEngine extends Engine
{
    /**
     * @var non-empty-array<non-empty-string>
     */
    protected array $dirs;

    /**
     * @param non-empty-list<non-empty-string>|non-empty-string $dirs
     */
    public function __construct(string|iterable $dirs)
    {
        $this->dirs = $this->dirsToArray($dirs);
    }

    /**
     * @param non-empty-string $name
     * @return non-empty-string|null
     */
    protected function lookup(string $name): ?string
    {
        foreach ($this->dirs as $directory) {
            if (\is_file($directory . \DIRECTORY_SEPARATOR . $name)) {
                return $directory . \DIRECTORY_SEPARATOR . $name;
            }
        }

        return null;
    }

    /**
     * @param non-empty-list<non-empty-string>|non-empty-string $dirs
     * @return non-empty-array<non-empty-string>
     * @psalm-suppress MixedReturnTypeCoercion
     * @psalm-suppress DocblockTypeContradiction
     */
    protected function dirsToArray(iterable|string $dirs): array
    {
        return match (true) {
            \is_string($dirs) => [ $dirs ],
            $dirs instanceof \Traversable => \iterator_to_array($dirs, false),
            default => $dirs,
        };
    }
}
