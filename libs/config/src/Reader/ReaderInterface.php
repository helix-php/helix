<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Reader;

interface ReaderInterface
{
    /**
     * @return list<non-empty-string>
     */
    public function getExtensions(): array;

    /**
     * @param non-empty-string $pathname
     * @return array
     */
    public function read(string $pathname): array;
}
