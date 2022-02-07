<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Exception;

use Helix\Config\EntryInterface;

/**
 * @psalm-type ValidationPathType = list<non-empty-string>
 */
interface ValidationExceptionInterface extends \Throwable
{
    /**
     * @var non-empty-string
     */
    public const PATH_DEPTH_DELIMITER = EntryInterface::PATH_DEPTH_DELIMITER;

    /**
     * @return ValidationPathType
     */
    public function getPath(): array;

    /**
     * @param non-empty-string $delimiter
     * @return non-empty-string
     */
    public function getPathAsString(string $delimiter = self::PATH_DEPTH_DELIMITER): string;

    /**
     * @return non-empty-string
     */
    public function getValidationMessage(): string;
}
