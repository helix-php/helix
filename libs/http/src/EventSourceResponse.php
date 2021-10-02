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
use Helix\Http\Stream\EventSourceStream;
use Psr\Http\Message\StreamInterface;

final class EventSourceResponse extends Response
{
    /**
     * {@inheritDoc}
     */
    public function __construct(
        \Closure|\Generator|StreamInterface $stream,
        StatusCodeInterface $status = StatusCode::OK,
        array $headers = []
    ) {
        \set_time_limit(0);

        $headers = \array_merge($headers, [
            'content-type' => 'text/event-stream',
            'cache-control' => 'no-cache',
        ]);

        parent::__construct(EventSourceStream::create($stream), $status, $headers);
    }
}
