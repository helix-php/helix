<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router\Tests;

use HttpSoft\Message\ServerRequest;
use Helix\Contracts\Router\Exception\NotAllowedExceptionInterface;
use Helix\Contracts\Router\Exception\NotFoundExceptionInterface;
use Helix\Contracts\Router\Exception\RouterExceptionInterface;

/**
 * @package router
 * @group router
 */
class RouterTestCase extends TestCase
{
    public function testNotFound()
    {
        $this->expectException(NotFoundExceptionInterface::class);

        $router = $this->router();
        $router->match(new ServerRequest(uri: '/'));
    }

    public function testNotAllowed()
    {
        $this->expectException(NotAllowedExceptionInterface::class);

        $router = $this->router([
            $this->route(method: Method::POST),
        ]);

        $router->match(new ServerRequest(uri: '/'));
    }

    public function testRoutesDuplicate()
    {
        $this->expectException(RouterExceptionInterface::class);

        $this->router([
            $this->route(method: Method::POST),
            $this->route(method: Method::POST),
        ]);
    }

    public function testRoutesDuplicateWithUniqueMethods()
    {
        $this->expectNotToPerformAssertions();

        $this->router([
            $this->route(method: Method::GET),
            $this->route(method: Method::POST),
            $this->route(method: Method::PATCH),
            $this->route(method: Method::DELETE),
        ]);
    }

    public function methodsDataProvider(): array
    {
        $result = [];

        foreach ((new \ReflectionClass(Method::class))->getConstants() as $name => $value) {
            $result[$name] = [$value];
        }

        return $result;
    }

    /**
     * @dataProvider methodsDataProvider
     *
     * @param string $method
     * @throws NotAllowedExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function testMethodsMatching(string $method)
    {
        $router = $this->router([$this->route(handler: 'get', method: $method)]);

        $matched = $router->match(new ServerRequest(method: $method, uri: '/'));

        $this->assertSame($matched->getMethod(), $method);
    }

    public function testConnectMethod(): void
    {
        $this->expectNotToPerformAssertions();

        ($router = $this->router())
            ->connect('/', '')
        ;

        $router->match(new ServerRequest(method: Method::CONNECT, uri: '/'));
    }

    public function testDeleteMethod(): void
    {
        $this->expectNotToPerformAssertions();

        ($router = $this->router())
            ->delete('/', '')
        ;

        $router->match(new ServerRequest(method: Method::DELETE, uri: '/'));
    }

    public function testGetMethod(): void
    {
        $this->expectNotToPerformAssertions();

        ($router = $this->router())
            ->get('/', '')
        ;

        $router->match(new ServerRequest(method: Method::GET, uri: '/'));
    }

    public function testHeadMethod(): void
    {
        $this->expectNotToPerformAssertions();

        ($router = $this->router())
            ->head('/', '')
        ;

        $router->match(new ServerRequest(method: Method::HEAD, uri: '/'));
    }

    public function testOptionsMethod(): void
    {
        $this->expectNotToPerformAssertions();

        ($router = $this->router())
            ->options('/', '')
        ;

        $router->match(new ServerRequest(method: Method::OPTIONS, uri: '/'));
    }

    public function testPostMethod(): void
    {
        $this->expectNotToPerformAssertions();

        ($router = $this->router())
            ->post('/', '')
        ;

        $router->match(new ServerRequest(method: Method::POST, uri: '/'));
    }

    public function testPutMethod(): void
    {
        $this->expectNotToPerformAssertions();

        ($router = $this->router())
            ->put('/', '')
        ;

        $router->match(new ServerRequest(method: Method::PUT, uri: '/'));
    }

    public function testTraceMethod(): void
    {
        $this->expectNotToPerformAssertions();

        ($router = $this->router())
            ->trace('/', '')
        ;

        $router->match(new ServerRequest(method: Method::TRACE, uri: '/'));
    }

    public function testPatchMethod(): void
    {
        $this->expectNotToPerformAssertions();

        ($router = $this->router())
            ->patch('/', '')
        ;

        $router->match(new ServerRequest(method: Method::PATCH, uri: '/'));
    }
}
