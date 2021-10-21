<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Reader;

class PhpReader extends Reader
{
    /**
     * {@inheritDoc}
     */
    public function read(string $pathname): array
    {
        try {
            return require $pathname;
        } catch (\Throwable $e) {
            throw $this->readError($pathname, $e);
        }
    }
}
