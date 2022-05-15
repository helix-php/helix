<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Session;

interface SessionIdInterface extends \Stringable
{
    /**
     * @return bool
     */
    public function isNew(): bool;

    /**
     * String representation of session identifier.
     *
     * @return non-empty-string
     */
    public function __toString(): string;
}
