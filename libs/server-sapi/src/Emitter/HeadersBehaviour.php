<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server\Sapi\Emitter;

enum HeadersBehaviour
{
    /**
     * Throw an exception in case of the headers has already been sent.
     */
    case ERROR;

    /**
     * Ignore sending headers if they have already been sent.
     */
    case SKIP;
}
