<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Router;

interface RegistrarInterface
{
    /**
     * @param RouteInterface $route
     * @param RouteInterface ...$routes
     * @return $this
     */
    public function add(RouteInterface $route, RouteInterface ...$routes): self;
}
