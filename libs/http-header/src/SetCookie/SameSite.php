<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Header\SetCookie;

enum SameSite: string
{
    /**
     * The browser sends the cookie only for same-site requests (that is,
     * requests originating from the same site that set the cookie). If the
     * request originated from a different URL than the current one, no cookies
     * with the SameSite=Strict attribute are sent.
     */
    case STRICT = 'Strict';

    /**
     * The cookie is withheld on cross-site subrequests, such as calls to load
     * images or frames, but is sent when a user navigates to the URL from an
     * external site, such as by following a link
     */
    case LAX = 'Lax';

    /**
     * The browser sends the cookie with both cross-site and same-site requests.
     */
    case NONE = 'None';
}
