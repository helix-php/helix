<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server;

abstract class ExternalServerCreateInfo extends ServerCreateInfo
{
    /**
     * @var array
     */
    public array $server;

    /**
     * @param array|null $vars
     */
    public function __construct(
        array $vars = null,
    ) {
        $this->server = $vars ?? $_SERVER;
    }
}
