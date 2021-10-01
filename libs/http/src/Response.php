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
use Nyholm\Psr7\Response as BaseResponse;
use Psr\Http\Message\StreamInterface;

class Response extends BaseResponse
{
    /**
     * @param string|resource|StreamInterface|null $body
     * @param StatusCodeInterface $status
     * @param array $headers
     */
    public function __construct(mixed $body, StatusCodeInterface $status = StatusCode::OK, array $headers = [])
    {
        if ($body instanceof \Stringable) {
            $body = (string)$body;
        }

        parent::__construct($status->getCode(), $headers, $body, reason: $status->getReasonPhrase());
    }
}
