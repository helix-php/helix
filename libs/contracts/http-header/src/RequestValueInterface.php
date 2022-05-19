<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Http\Header;

/**
 * Means that the header can be used as a response header.
 */
interface RequestValueInterface extends ValueInterface
{
    /**
     * Creates a new header object from a header string value.
     *
     * @param string $value
     * @return static
     */
    public static function parse(string $value): self;
}
