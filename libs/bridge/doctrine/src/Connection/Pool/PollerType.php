<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\Connection\Pool;

enum PollerType: string
{
    /**
     * Use a common connection for all connections for reading
     * and unique for each client for writing.
     *
     * client#1 ─┬ ᗒ ─ [connection#1]
     *           └ ᗕ ─ [connection#2]
     *
     * client#2 ─┬ ᗒ ─ [connection#1]
     *           └ ᗕ ─ [connection#3]
     */
    case SINGLE_READ_UNIQUE_WRITE = 'single_read_uniq_write';

    /**
     * Use duplex connection (read and write) unique for each client.
     *
     * client#1 ─┬ ᗒ ─ [connection#1]
     *           └ ᗕ ─ [connection#1]
     *
     * client#2 ─┬ ᗒ ─ [connection#2]
     *           └ ᗕ ─ [connection#2]
     */
    case UNIQUE = 'uniq';

    /**
     * Use one common connection for all clients.
     *
     * client#1 ─┬ ᗒ ─ [connection#1]
     *           └ ᗕ ─ [connection#1]
     *
     * client#2 ─┬ ᗒ ─ [connection#1]
     *           └ ᗕ ─ [connection#1]
     */
    case SINGLE = 'single';
}
