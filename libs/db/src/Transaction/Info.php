<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Transaction;

#[\Attribute(\Attribute::TARGET_CLASS_CONSTANT)]
final class Info
{
    /**
     * @param bool $dirtyReads
     * @param bool $nonRepeatableReads
     * @param bool $phantoms
     */
    public function __construct(
        public bool $dirtyReads = false,
        public bool $nonRepeatableReads = false,
        public bool $phantoms = false,
    ) {}
}
