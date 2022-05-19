<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Http\Header;

use Helix\Contracts\Http\Header\Attribute\AttributeInterface;
use Helix\Contracts\Http\Header\Attribute\FlagInterface;

interface ProvidesAttributesInterface
{
    /**
     * Returns a list of header value attributes.
     *
     * Can contain either values in the {@see AttributeInterface} (name and
     * value) or {@see FlagInterface} (only name) formats.
     *
     * For example:
     * ```
     * > Set-Cookie: <attributes>
     *  [
     *      AttributeInterface(name: 'Name', 'Value'),
     *      AttributeInterface(name: 'Max-Age', value: 42),
     *      FlagInterface(name: 'Secure'),
     *      FlagInterface(name: 'HttpOnly'),
     *  ]
     *
     * // Can be presented in the format
     * > Set-Cookie: Name=Value; Max-Age=42; Secure; HttpOnly
     * ```
     *
     * @return iterable<FlagInterface>
     */
    public function getAttributes(): iterable;
}
