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
use Helix\Mime\Exception\DetectionException;

abstract class Parser implements ParserInterface
{
    /**
     * @param string $content
     * @return TypeInterface
     */
    public function fromContents(string $content): TypeInterface
    {
        $resource = \fopen('php://memory', 'ab');

        \fwrite($resource, $content);
        \rewind($resource);

        return $this->fromResourceStream($resource);
    }
}
