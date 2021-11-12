<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server\Sapi\Emitter;

enum BodyBehaviour
{
    /**
     * Throw an exception if the body has already been sent.
     */
    case ERROR;

    /**
     * Ignore sending body if it have already been sent.
     */
    case SKIP;

    /**
     * Add content to the sent body.
     */
    case APPEND;
}
