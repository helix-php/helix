<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http;

use Helix\Contracts\Http\StatusCode\StatusCodeInterface;
use Helix\Http\StatusCode\StatusCode;
use Psr\Http\Message\UriInterface;

class MovedRedirectResponse extends RedirectResponse
{
    /**
     * {@inheritDoc}
     */
    public function __construct(
        string|UriInterface $location,
        StatusCodeInterface $status = StatusCode::MOVED_PERMANENTLY,
        array $headers = []
    ) {
        parent::__construct($location, $status, $headers);
    }
}
