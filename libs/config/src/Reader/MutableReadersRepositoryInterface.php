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
 * @psalm-import-type ConfigFileExtension from ReadersRepositoryInterface
 */
interface MutableReadersRepositoryInterface extends ReadersRepositoryInterface
{
    /**
     * @param ConfigFileExtension $ext
     * @param ReaderInterface $reader
     * @return void
     */
    public function add(string $ext, ReaderInterface $reader): void;
}
