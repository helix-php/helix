<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server;

abstract class InternalServerCreateInfo extends ServerCreateInfo
{
    /**
     * @param string $host
     * @param positive-int $port
     */
    public function __construct(
        public string $host = '127.0.0.1',
        public int $port = 80,
    ) {}
}
