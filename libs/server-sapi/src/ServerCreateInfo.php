<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server\Sapi;

use Helix\Server\ExternalServerCreateInfo;

final class ServerCreateInfo extends ExternalServerCreateInfo
{
    /**
     * @param array|null $vars
     * @param array|null $cookie
     * @param array|null $files
     * @param EmitterCreateInfo $emitter
     */
    public function __construct(
        array $vars = null,
        array $cookie = null,
        array $files = null,
        public readonly EmitterCreateInfo $emitter = new EmitterCreateInfo()
    ) {
        parent::__construct($vars, $cookie, $files);
    }
}
