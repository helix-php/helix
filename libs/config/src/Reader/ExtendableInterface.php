<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Reader;

interface ExtendableInterface
{
    /**
     * @param non-empty-string $extension
     * @param ReaderInterface $reader
     * @return $this
     */
    public function extend(string $extension, ReaderInterface $reader): self;
}
