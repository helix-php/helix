<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Http\Header\Attribute;

interface FlagInterface extends \Stringable
{
    /**
     * Returns name of the attribute.
     *
     * @return non-empty-string
     */
    public function getName(): string;

    /**
     * String representation of the flag.
     *
     * @return non-empty-string
     */
    public function __toString(): string;
}
