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
    public readonly array $server;

    /**
     * @var array
     */
    public readonly array $files;

    /**
     * @var array
     */
    public readonly array $cookie;

    /**
     * @param array|null $vars
     * @param array|null $cookie
     * @param array|null $files
     */
    public function __construct(
        array $vars = null,
        array $cookie = null,
        array $files = null,
    ) {
        $this->server = $vars ?? $_SERVER;
        $this->cookie = $cookie ?? $_COOKIE;
        $this->files = $files ?? $_FILES;
    }
}
