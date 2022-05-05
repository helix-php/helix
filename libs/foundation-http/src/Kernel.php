<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Http;

use Helix\Container\DispatcherInterface;
use Helix\Container\InstantiatorInterface;
use Helix\Container\ParamResolver\NamedArgumentsResolver;
use Helix\Container\ParamResolver\ObjectResolver;
use Helix\Container\ParamResolver\ValueResolverInterface;
use Helix\Contracts\Middleware\PipelineInterface;
use Helix\Contracts\Router\MatchedRouteInterface;
use Helix\Contracts\Router\RouterInterface;
use Helix\Middleware\CallableHandler;
use Helix\Middleware\Pipeline;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

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
        private readonly RouterInterface $router,
        private readonly DispatcherInterface $dispatcher,
        private readonly InstantiatorInterface $instantiator,
    ) {
    }

    /**
     * @param string|MiddlewareInterface $middleware
     * @param iterable<ValueResolverInterface> $resolvers
     * @return MiddlewareInterface
     */
    protected function make(string|MiddlewareInterface $middleware, iterable $resolvers = []): MiddlewareInterface
    {
        if ($middleware instanceof MiddlewareInterface) {
            return $middleware;
        }

        return $this->instantiator->make($middleware, $resolvers);
    }

    /**
     * @param iterable<string|MiddlewareInterface> $middleware
     * @param iterable<ValueResolverInterface> $resolvers
     * @return iterable<MiddlewareInterface>
     */
    protected function getMiddleware(iterable $middleware = [], iterable $resolvers = []): iterable
    {
        foreach ($middleware as $concrete) {
            yield $this->make($concrete, $resolvers);
        }
    }

    /**
     * @param ServerRequestInterface $request
     * @param MatchedRouteInterface $route
     * @return ResponseInterface
     */
    protected function dispatch(ServerRequestInterface $request, MatchedRouteInterface $route): ResponseInterface
    {
        $resolvers = $this->getMiddlewareValueResolvers($request, $route);

        $handler = new CallableHandler(fn (): mixed =>
            $this->dispatcher->call($route->getHandler(), $resolvers)
        );

        return $this->pipeline($route->getMiddleware(), $resolvers)
            ->process($request, $handler);
    }

    /**
     * @param ServerRequestInterface $request
     * @param MatchedRouteInterface $route
     * @return iterable<ValueResolverInterface>
     */
    private function getMiddlewareValueResolvers(ServerRequestInterface $request, MatchedRouteInterface $route): iterable
    {
        return [
            new ObjectResolver($request),
            new ObjectResolver($route),
            new NamedArgumentsResolver($route->getArguments())
        ];
    }

    /**
     * @param ServerRequestInterface $request
     * @return iterable<ValueResolverInterface>
     */
    private function getRequestValueResolvers(ServerRequestInterface $request): iterable
    {
        return [
            new ObjectResolver($request),
        ];
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $handler = new CallableHandler(function (ServerRequestInterface $request): mixed {
            return $this->dispatch($request, $this->router->match($request));
        });

        return $this->pipeline($this->middleware, $this->getRequestValueResolvers($request))
            ->process($request, $handler);
    }

    /**
     * @param iterable $middleware
     * @param iterable<ValueResolverInterface> $resolvers
     * @return PipelineInterface
     */
    private function pipeline(iterable $middleware, iterable $resolvers): PipelineInterface
    {
        return new Pipeline($this->getMiddleware($middleware, $resolvers));
    }
}
