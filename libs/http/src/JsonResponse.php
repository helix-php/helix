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

final class JsonResponse extends Response
{
    /**
     * @var int
     */
    private const DEFAULT_JSON_FLAGS = \JSON_HEX_TAG
                                     | \JSON_HEX_APOS
                                     | \JSON_HEX_AMP
                                     | \JSON_HEX_QUOT;

    /**
     * @param array $payload
     * @param int $flags
     * @param StatusCodeInterface $status
     * @param array $headers
     * @throws \JsonException
     */
    public function __construct(
        array $payload = [],
        int $flags = self::DEFAULT_JSON_FLAGS,
        StatusCodeInterface $status = StatusCode::OK,
        array $headers = []
    ) {
        $body = \json_encode($payload, $flags | \JSON_THROW_ON_ERROR);

        parent::__construct($body, $status, \array_merge($headers, ['content-type' => 'application/json']));
    }
}
