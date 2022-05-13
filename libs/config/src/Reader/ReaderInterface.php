<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Reader;

use Helix\Config\Exception\NotFoundException;
use Helix\Config\Exception\NotLoadableException;
use Helix\Config\Exception\NotReadableException;

interface ReaderInterface
{
    /**
     * @psalm-taint-sink file $pathname
     * @param non-empty-string $pathname
     * @return array
     * @throws NotFoundException
     * @throws NotReadableException
     * @throws NotLoadableException
     */
    public function fromFile(string $pathname): array;

    /**
     * @param string $data
     * @return array
     * @throws NotLoadableException
     */
    public function fromString(string $data): array;
}
