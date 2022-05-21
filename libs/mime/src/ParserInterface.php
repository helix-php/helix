<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Mime;

use Helix\Contracts\Mime\TypeInterface;

interface ParserInterface
{
    /**
     * @psalm-taint-sink file $pathname
     * @param non-empty-string $pathname
     * @return TypeInterface
     */
    public function fromPathname(string $pathname): TypeInterface;

    /**
     * @param string $content
     * @return TypeInterface
     */
    public function fromContents(string $content): TypeInterface;

    /**
     * @param resource $stream
     * @return TypeInterface
     */
    public function fromResourceStream(mixed $stream): TypeInterface;
}
