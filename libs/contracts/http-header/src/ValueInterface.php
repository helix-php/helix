<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Http\Header;

interface ValueInterface extends \Stringable
{
    /**
     * Returns string representation of the header value field.
     *
     * @return non-empty-string
     */
    public function __toString(): string;
}
