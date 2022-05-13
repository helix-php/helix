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
use Helix\Config\Exception\NotReadableException;

abstract class Reader implements ReaderInterface
{
    /**
     * @var non-empty-string
     */
    protected const ERROR_NOT_FOUND = 'Configuration file "%s" not found';

    /**
     * @var non-empty-string
     */
    protected const ERROR_NOT_READABLE = 'Configuration file "%s" not readable';

    /**
     * {@inheritDoc}
     */
    public function fromFile(string $pathname): array
    {
        $this->assertFileLoadable($pathname);

        return $this->fromString(\file_get_contents($pathname));
    }

    /**
     * @psalm-taint-sink file $pathname
     * @param non-empty-string $pathname
     * @return void
     * @throws NotFoundException
     * @throws NotReadableException
     */
    protected function assertFileLoadable(string $pathname): void
    {
        if (!is_file($pathname)) {
            throw new NotFoundException(\sprintf(static::ERROR_NOT_FOUND, $pathname));
        }

        if (!is_file($pathname)) {
            throw new NotReadableException(\sprintf(static::ERROR_NOT_READABLE, $pathname));
        }
    }
}
