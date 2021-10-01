<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server\Sapi;

use Helix\Server\Sapi\Emitter\BodyBehaviour;
use Helix\Server\Sapi\Emitter\HeadersBehaviour;

final class EmitterCreateInfo
{
    /**
     * @param positive-int|null $bufferLength
     * @param HeadersBehaviour $headers
     * @param BodyBehaviour $body
     */
    public function __construct(
        public readonly ?int $bufferLength = null,
        public readonly HeadersBehaviour $headers = HeadersBehaviour::SKIP,
        public readonly BodyBehaviour $body = BodyBehaviour::APPEND,
    ) {
        assert($bufferLength === null || $bufferLength > 0, 'Precondition [bufferLength > 0] failed');
    }
}
