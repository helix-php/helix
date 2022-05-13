<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Reader;

/**
 * @psalm-type ConfigFileExtension = non-empty-string
 */
interface ReadersRepositoryInterface
{
    /**
     * @param ConfigFileExtension $ext
     * @return ReaderInterface
     */
    public function get(string $ext): ReaderInterface;

    /**
     * @param ConfigFileExtension $ext
     * @return ReaderInterface|null
     */
    public function find(string $ext): ?ReaderInterface;

    /**
     * @param ConfigFileExtension $ext
     * @return bool
     */
    public function has(string $ext): bool;
}
