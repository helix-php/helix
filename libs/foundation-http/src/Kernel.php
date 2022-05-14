<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Http;

use Helix\Container\ParamResolver\NamedArgumentsResolver;
use Helix\Container\ParamResolver\ObjectResolver;
use Helix\Contracts\Container\DispatcherInterface;
use Helix\Contracts\Container\InstantiatorInterface;
use Helix\Contracts\ParamResolver\ValueResolverInterface;
use Helix\Contracts\Router\MatchedRouteInterface;
use Helix\Contracts\Router\RouterInterface;
use Helix\Middleware\CallableHandler;
use Helix\Middleware\Pipeline;
use Helix\Router\ProvidesMiddlewareInterface;
use Helix\Router\ProvidesResolversInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Kernel implements RequestHandlerInterface
{
    /**
     * @var array<class-string<MiddlewareInterface>|MiddlewareInterface>
     */
    protected array $middleware = [];

    /**
     * @var array<class-string<ValueResolverInterface>|ValueResolverInterface>
     */
    protected array $resolvers = [];

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
        $this->onBoot();
    }

    /**
     * @return void
     */
    protected function onBoot(): void
    {
    }

    /**
     * @param ServerRequestInterface $request
     * @return void
     */
    protected function onDispatch(ServerRequestInterface $request): void
    {
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->onDispatch($request);

        return $this->preRouting($request);
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    private function preRouting(ServerRequestInterface $request): ResponseInterface
    {
        $resolvers = $this->getPreRoutingValueResolvers($request);
        $middleware = $this->getPreRoutingMiddleware();

        return (new Pipeline($this->getMiddlewareInstances($middleware, $resolvers)))
            ->process($request, new CallableHandler(fn (ServerRequestInterface $request): ResponseInterface =>
                $this->postRouting($request, $this->router->match($request))
            ));
    }

    /**
     * @param ServerRequestInterface $request
     * @param MatchedRouteInterface $route
     * @return ResponseInterface
     */
    private function postRouting(ServerRequestInterface $request, MatchedRouteInterface $route): ResponseInterface
    {
        $resolvers = $this->getPostRoutingValueResolvers($request, $route);
        $middleware = $this->getPostRoutingMiddleware($route);

        return (new Pipeline($this->getMiddlewareInstances($middleware, $resolvers)))
            ->process($request, new CallableHandler(fn (): ResponseInterface =>
                $this->dispatcher->call($route->getHandler(), $resolvers)
            ));
    }

    /**
     * @param iterable<class-string<MiddlewareInterface>|MiddlewareInterface> $middleware
     * @param iterable<ValueResolverInterface> $resolvers
     * @return iterable<MiddlewareInterface>
     */
    private function getMiddlewareInstances(iterable $middleware = [], iterable $resolvers = []): iterable
    {
        foreach ($middleware as $concrete) {
            yield $concrete instanceof MiddlewareInterface
                ? $concrete
                : $this->instantiator->make($concrete, $resolvers)
            ;
        }
    }

    /**
     * @param iterable<class-string<ValueResolverInterface>|ValueResolverInterface> $resolvers
     * @param array<ValueResolverInterface> $previous
     * @return array<ValueResolverInterface>
     */
    private function getValueResolverInstances(iterable $resolvers = [], array $previous = []): array
    {
        foreach ($resolvers as $resolver) {
            $previous[] = $resolver instanceof ValueResolverInterface
                ? $resolver
                : $this->instantiator->make($resolver, $previous)
            ;
        }

        return $previous;
    }

    /**
     * @param MatchedRouteInterface $route
     * @return iterable<non-empty-string|class-string|MiddlewareInterface>
     */
    private function getPostRoutingMiddleware(MatchedRouteInterface $route): iterable
    {
        if ($route instanceof ProvidesMiddlewareInterface) {
            return $route->getMiddleware();
        }

        return [];
    }

    /**
     * @return iterable<non-empty-string|class-string|MiddlewareInterface>
     */
    private function getPreRoutingMiddleware(): iterable
    {
        return $this->middleware;
    }

    /**
     * @param ServerRequestInterface $request
     * @param MatchedRouteInterface $route
     * @return iterable<ValueResolverInterface>
     */
    private function getPostRoutingValueResolvers(ServerRequestInterface $request, MatchedRouteInterface $route): iterable
    {
        $resolvers = $this->resolvers;

        if ($route instanceof ProvidesResolversInterface) {
            foreach ($route->getResolvers() as $resolver) {
                $resolvers[] = $resolver;
            }
        }

        return $this->getValueResolverInstances($resolvers, [
            new ObjectResolver($request),
            new ObjectResolver($route),
            new NamedArgumentsResolver($route->getArguments()),
        ]);
    }

    /**
     * @param ServerRequestInterface $request
     * @return iterable<ValueResolverInterface>
     */
    private function getPreRoutingValueResolvers(ServerRequestInterface $request): iterable
    {
        return $this->getValueResolverInstances($this->resolvers, [
            new ObjectResolver($request),
        ]);
    }
}
