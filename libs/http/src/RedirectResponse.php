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

class RedirectResponse extends Response
{
    /**
     * @param string|UriInterface $location
     * @param StatusCodeInterface $status
     * @param array $headers
     */
    public function __construct(
        string|UriInterface $location,
        StatusCodeInterface $status = StatusCode::FOUND,
        array $headers = []
    ) {
        parent::__construct('', $status, \array_merge($headers, [
            'Location' => (string)$location,
        ]));
    }
}
