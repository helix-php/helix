<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Migrations\Exception;

class DirectoryNotFoundException extends MigrationException
{
    /**
     * @var non-empty-string
     */
    final public const ERROR_DIRECTORY_NOT_FOUND = 'Could not load migrations from directory "%s":'
                                                 . ' Directory not found';

    /**
     * @param string $directory
     * @return static
     */
    public static function fromDirectory(string $directory): self
    {
        return new self(\sprintf(self::ERROR_DIRECTORY_NOT_FOUND, $directory));
    }
}
