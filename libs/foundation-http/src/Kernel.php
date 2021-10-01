<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Http;

use Helix\Contracts\Dispatcher\DispatcherInterface;
use Helix\Contracts\Container\Exception\NotInstantiatableExceptionInterface;
use Helix\Contracts\Container\InstantiatorInterface;
use Helix\Contracts\Router\MatchedRouteInterface;
use Helix\Contracts\Router\RouteInterface;
use Helix\Contracts\Router\RouterInterface;
use Helix\Middleware\CallableHandler;
use Helix\Middleware\Pipeline;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * @package foundation
 */
class Kernel implements RequestHandlerInterface
{
    /**
     * @var array<MiddlewareInterface>
     */
    protected array $middleware = [];

    /**
     * @param RouterInterface $router
     * @param DispatcherInterface $dispatcher
     * @param InstantiatorInterface $instantiator
     */
    public function __construct(
        private RouterInterface $router,
        private DispatcherInterface $dispatcher,
        private InstantiatorInterface $instantiator,
    ) {
    }

    /**
     * @param string|MiddlewareInterface $middleware
     * @param callable|array|null $resolver
     * @return MiddlewareInterface
     * @throws NotInstantiatableExceptionInterface
     */
    protected function make(string|MiddlewareInterface $middleware, callable|array $resolver = null): MiddlewareInterface
    {
        if ($middleware instanceof MiddlewareInterface) {
            return $middleware;
        }

        return $this->instantiator->make($middleware, $resolver);
    }

    /**
     * @param iterable<string|MiddlewareInterface> $middleware
     * @param callable|array|null $resolver
     * @return iterable<MiddlewareInterface>
     * @throws NotInstantiatableExceptionInterface
     */
    protected function getMiddleware(iterable $middleware = [], callable|array $resolver = null): iterable
    {
        foreach ($middleware as $concrete) {
            yield $this->make($concrete, $resolver);
        }
    }

    /**
     * @param ServerRequestInterface $request
     * @param MatchedRouteInterface $route
     * @return ResponseInterface
     * @throws NotInstantiatableExceptionInterface
     */
    protected function dispatch(ServerRequestInterface $request, MatchedRouteInterface $route): ResponseInterface
    {
        $resolver = $this->getRouteResolver($request, $route);

        // Create route middleware list
        $middleware = $this->getMiddleware($route->getMiddleware(), $resolver);

        // Create Controller handler
        $handler = new CallableHandler(fn() => $this->dispatcher->call($route->getHandler(), $resolver));

        // Dispatch
        return (new Pipeline($middleware))
            ->process($request, $handler)
        ;
    }

    /**
     * @param ServerRequestInterface $request
     * @return \Closure
     */
    private function getRequestResolver(ServerRequestInterface $request): \Closure
    {
        return static fn(\ReflectionNamedType $type, string $name): mixed => match ($type->getName()) {
            RequestInterface::class, ServerRequestInterface::class => $request,
            default => null,
        };
    }

    /**
     * @param ServerRequestInterface $request
     * @param MatchedRouteInterface $route
     * @return \Closure
     */
    private function getRouteResolver(ServerRequestInterface $request, MatchedRouteInterface $route): \Closure
    {
        $arguments = $route->getArguments();

        return static fn(\ReflectionNamedType $type, string $name): mixed => match ($type->getName()) {
            RequestInterface::class, ServerRequestInterface::class => $request,
            RouteInterface::class, MatchedRouteInterface::class => $route,
            'string' => $arguments[$name] ?? null,
            'int' => isset($arguments[$name]) ? (int)$arguments[$name] : null,
            default => null,
        };
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws NotInstantiatableExceptionInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $pipeline = new Pipeline(
            $this->getMiddleware($this->middleware, $this->getRequestResolver($request))
        );

        return $pipeline->process($request, new CallableHandler(function (ServerRequestInterface $request) {
            return $this->dispatch($request, $this->router->match($request));
        }));
    }
}
