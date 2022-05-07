<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router\Tests;

use Helix\Http\Method\Method;

/**
 * @group router
 */
class RouteTestCase extends TestCase
{
    public function testHandler(): void
    {
        $route = $this->route(handler: 'test');

        $this->assertSame('test', $route->getHandler());
    }

    public function testPath(): void
    {
        $route = $this->route('/example');

        $this->assertSame('/example', $route->getPath());
    }

    public function testPathNormalizePrefix(): void
    {
        $route = $this->route('example');

        $this->assertSame('/example', $route->getPath());
    }

    public function testPathNormalizeSuffix(): void
    {
        $route = $this->route('example/');

        $this->assertSame('/example', $route->getPath());
    }

    public function testPathNormalizeExtraPathDelimiters(): void
    {
        $route = $this->route('///////example//////////');

        $this->assertSame('/example', $route->getPath());
    }

    public function testMethod(): void
    {
        $route = $this->route(method: Method::GET);

        $this->assertSame(Method::GET, $route->getMethod());
    }

    public function testNormalizeMethod(): void
    {
        $route = $this->route(method: 'get');

        $this->assertSame(Method::GET, $route->getMethod());
    }

    public function testNameAnonymous(): void
    {
        $route = $this->route();

        $this->assertNull($route->getName());
    }

    public function testName(): void
    {
        $route = $this->route()
            ->as('home')
        ;

        $this->assertSame('home', $route->getName());
    }

    public function testMiddlewareEmptyList(): void
    {
        $route = $this->route();

        $this->assertEmpty($route->getMiddleware());
    }

    public function testMiddlewareList(): void
    {
        $route = $this->route()
            ->through(...$middleware = ['a', $this, 'b'])
        ;

        $this->assertEquals($middleware, $route->getMiddleware());
    }

    public function testEmptyParameters(): void
    {
        $route = $this->route();

        $this->assertSame([], $route->getParameters());
    }

    public function testParameters(): void
    {
        $route = $this->route()
            ->where('name', 'pattern')
        ;

        $this->assertSame(['name' => 'pattern'], $route->getParameters());
    }
}
