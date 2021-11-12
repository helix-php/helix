<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router\Tests;

use Helix\Contracts\Router\RouteInterface;
use Helix\Contracts\Router\RouterInterface;
use Helix\Http\Method\Method;
use Helix\Router\Route;
use Helix\Router\Router;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * @package router
 * @group router
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * @param string $path
     * @param callable|string $handler
     * @param Method $method
     * @return Route
     */
    protected function route(string $path = '/', mixed $handler = 'print', Method $method = Method::GET): Route
    {
        return new Route($path, $handler, $method);
    }

    /**
     * @param array<RouteInterface> $routes
     * @return RouterInterface
     */
    protected function router(array $routes = []): RouterInterface
    {
        $router = new Router(new Psr17Factory(), new Psr17Factory());

        if ($routes === []) {
            return $router;
        }

        return $router;
    }
}
