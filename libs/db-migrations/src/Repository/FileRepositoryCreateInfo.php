<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Migrations\Repository;

final class FileRepositoryCreateInfo extends CreateInfo
{
    /**
     * @var array<non-empty-string>
     */
    public readonly array $directories;

    /**
     * @param iterable<non-empty-string> $directories
     */
    public function __construct(
        iterable $directories = []
    ) {
        $this->directories = $this->formatDirectories($directories);
    }

    /**
     * @param iterable<non-empty-string> $directories
     * @return array<non-empty-string>
     */
    private function formatDirectories(iterable $directories): array
    {
        $result = [];

        foreach ($directories as $directory) {
            $result[] = $directory;
        }

        return $result;
    }
}
