<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Pool;

enum Status
{
    /**
     * The status of the active (used) object in the pool.
     */
    case ACTIVE;

    /**
     * The status of a free object in the pool that can be
     * reused in the future.
     */
    case FREE;
}
