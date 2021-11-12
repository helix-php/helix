<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router\Reader;

use Helix\Contracts\Router\RouteInterface;
use Helix\Router\Exception\BadRouteDefinitionException;

/**
 * @package router
 */
interface ReaderInterface
{
    /**
     * @param class-string $class
     * @return iterable<RouteInterface>
     * @throws BadRouteDefinitionException
     */
    public function read(string $class): iterable;
}
