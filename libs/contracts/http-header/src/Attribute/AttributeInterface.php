<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Http\Header\Attribute;

interface AttributeInterface extends FlagInterface
{
    /**
     * Returns value of the attribute.
     *
     * @return string
     */
    public function getValue(): string;
}
