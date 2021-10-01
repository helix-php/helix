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
use Psr\Http\Message\StreamInterface;

class HtmlResponse extends Response
{
    /**
     * @param string|resource|StreamInterface|null $body
     * @param StatusCodeInterface $status
     * @param array $headers
     */
    public function __construct(mixed $body = null, StatusCodeInterface $status = StatusCode::OK, array $headers = [])
    {
        parent::__construct($body, $status, \array_merge($headers, ['content-type' => 'text/html']));
    }
}
