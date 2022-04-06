<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router;

use FastRoute\Dispatcher;
use Helix\Contracts\Http\Method\MethodInterface;
use Helix\Contracts\Http\StatusCode\StatusCodeInterface;
use Helix\Contracts\Router\MatchedRouteInterface;
use Helix\Contracts\Router\RegistrarInterface;
use Helix\Contracts\Router\RepositoryInterface;
use Helix\Contracts\Router\RouteInterface;
use Helix\Contracts\Router\RouterInterface;
use Helix\Http\Method\Method;
use Helix\Http\StatusCode\StatusCode;
use Helix\Router\Exception\BadRouteDefinitionException;
use Helix\Router\Exception\RouteMatchingException;
use Helix\Router\Exception\RouteNotAllowedException;
use Helix\Router\Exception\RouteNotFoundException;
use Helix\Router\Exception\RouterException;
use Helix\Router\Generator\Exception\RouteGeneratorExceptionInterface;
use Helix\Router\Generator\Generator;
use Helix\Router\Generator\GeneratorInterface;
use Helix\Router\Internal\Compiler;
use Helix\Router\Internal\Normalizer;
use Helix\Router\Reader\AttributeReader;
use Helix\Router\Reader\ReaderInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriFactoryInterface;

class Router implements RegistrarInterface, RepositoryInterface, RouterInterface
{
    /**
     * @var int
     */
    private const INFO_STATUS = 0x00;

    /**
     * @var int
     */
    private const INFO_HANDLER = 0x01;

    /**
     * @var int
     */
    private const INFO_VARS = 0x02;

    /**
     * @var array<Route>
     */
    protected array $routes = [];

    /**
     * @var Compiler
     */
    private Compiler $compiler;

    /**
     * @var Dispatcher|null
     */
    private ?Dispatcher $dispatcher = null;

    /**
     * @var ReaderInterface
     */
    private ReaderInterface $reader;

    /**
     * @var \Closure
     */
    private \Closure $defaultHandler;

    /**
     * @var GeneratorInterface
     */
    private GeneratorInterface $generator;

    /**
     * @param ResponseFactoryInterface $responses
     * @param UriFactoryInterface $uris
     * @param ReaderInterface|null $reader
     */
    public function __construct(
        private ResponseFactoryInterface $responses,
        private UriFactoryInterface $uris,
        ReaderInterface $reader = null
    ) {
        $this->compiler = new Compiler();
        $this->generator = new Generator($uris, $this);
        $this->reader = $reader ?? new AttributeReader();
        $this->defaultHandler = function (): ResponseInterface {
            $status = StatusCode::NOT_IMPLEMENTED;

            return $this->responses->createResponse($status->getCode(), $status->getReasonPhrase());
        };
    }

    /**
     * {@inheritDoc}
     * @throws RouterException
     * @psalm-suppress PossiblyNullReference
     * @psalm-suppress ArgumentTypeCoercion
     * @psalm-suppress MixedArrayOffset
     */
    public function match(ServerRequestInterface $request): MatchedRouteInterface
    {
        $this->compileIfNotCompiled();

        $uri = $request->getUri();
        $path = Normalizer::path($uri->getPath());

        /** @var array{int, mixed, array<string>} $result */
        $result = $this->dispatcher->dispatch($request->getMethod(), $path);

        return match($result[self::INFO_STATUS]) {
            Dispatcher::FOUND => new MatchedRoute(
                $this->routes[$result[self::INFO_HANDLER]],
                $request,
                $result[self::INFO_VARS]
            ),

            Dispatcher::NOT_FOUND => throw new RouteNotFoundException($request, 'Route Not Found'),
            Dispatcher::METHOD_NOT_ALLOWED => throw new RouteNotAllowedException($request, 'Method Not Allowed'),
            default => throw new RouteMatchingException($request, 'Internal Router Error'),
        };
    }

    /**
     * @param MethodInterface $method
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Route
     */
    public function make(MethodInterface $method, string $path, mixed $handler = null): Route
    {
        $this->add($route = new Route($path, $handler ?? $this->defaultHandler, $method));

        return $route;
    }

    /**
     * {@inheritDoc}
     */
    public function add(RouteInterface $route, RouteInterface ...$routes): self
    {
        $this->clear();

        foreach ([$route, ...$routes] as $current) {
            $this->routes[] = $current;
        }

        return $this;
    }

    /**
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Route
     */
    public function connect(string $path, mixed $handler = null): Route
    {
        return $this->make(Method::CONNECT, $path, $handler);
    }

    /**
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Route
     */
    public function delete(string $path, mixed $handler = null): Route
    {
        return $this->make(Method::DELETE, $path, $handler);
    }

    /**
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Route
     */
    public function get(string $path, mixed $handler = null): Route
    {
        return $this->make(Method::GET, $path, $handler);
    }

    /**
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Route
     */
    public function head(string $path, mixed $handler = null): Route
    {
        return $this->make(Method::HEAD, $path, $handler);
    }

    /**
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Route
     */
    public function options(string $path, mixed $handler = null): Route
    {
        return $this->make(Method::OPTIONS, $path, $handler);
    }

    /**
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Route
     */
    public function post(string $path, mixed $handler = null): Route
    {
        return $this->make(Method::POST, $path, $handler);
    }

    /**
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Route
     */
    public function put(string $path, mixed $handler = null): Route
    {
        return $this->make(Method::PUT, $path, $handler);
    }

    /**
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Route
     */
    public function trace(string $path, mixed $handler = null): Route
    {
        return $this->make(Method::TRACE, $path, $handler);
    }

    /**
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Route
     */
    public function patch(string $path, mixed $handler = null): Route
    {
        return $this->make(Method::PATCH, $path, $handler);
    }

    /**
     * @param non-empty-string $path
     * @param string|\Stringable $location
     * @param iterable<MethodInterface> $methods
     * @param StatusCodeInterface $code
     * @return Group
     */
    private function redirectToUri(
        string $path,
        string|\Stringable $location,
        StatusCodeInterface $code = StatusCode::FOUND,
        iterable $methods = [],
    ): Group {
        return $this->oneOf($methods, $path, fn () =>
            $this->responses->createResponse($code->getCode(), $code->getReasonPhrase())
                ->withAddedHeader('Location', (string)$location)
            );
    }

    /**
     * @param non-empty-string $path
     * @param non-empty-string $route
     * @param iterable<string, string> $args
     * @param StatusCodeInterface $code
     * @param iterable<MethodInterface> $methods
     * @return Group
     * @throws RouteGeneratorExceptionInterface
     */
    private function redirectToRoute(
        string $path,
        string $route,
        iterable $args = [],
        StatusCodeInterface $code = StatusCode::FOUND,
        iterable $methods = [],
    ): Group {
        $location = $this->generator->generate($route, $args);

        return $this->redirectToUri($path, $location, $code, $methods);
    }

    /**
     * @param non-empty-string $path
     * @param string|\Stringable $location
     * @param iterable<MethodInterface> $methods
     * @return Group
     */
    public function redirect(string $path, string|\Stringable $location, iterable $methods = []): Group
    {
        return $this->redirectToUri($path, $location, StatusCode::FOUND, $methods);
    }

    /**
     * @param non-empty-string $path
     * @param string $route
     * @param iterable<string, string> $args
     * @param iterable<MethodInterface> $methods
     * @return Group
     * @throws BadRouteDefinitionException
     */
    public function redirectTo(string $path, string $route, iterable $args = [], iterable $methods = []): Group
    {
        return $this->redirectToRoute($path, $route, $args, StatusCode::FOUND, $methods);
    }

    /**
     * @param non-empty-string $path
     * @param non-empty-string|\Stringable $location
     * @param iterable<MethodInterface> $methods
     * @return Group
     */
    public function temporary(string $path, string|\Stringable $location, iterable $methods = []): Group
    {
        return $this->redirectToUri($path, $location, StatusCode::TEMPORARY_REDIRECT, $methods);
    }

    /**
     * @param non-empty-string $path
     * @param string $route
     * @param iterable<string, string> $args
     * @param iterable<MethodInterface> $methods
     * @return Group
     * @throws BadRouteDefinitionException
     */
    public function temporaryTo(string $path, string $route, iterable $args = [], iterable $methods = []): Group
    {
        return $this->redirectToRoute($path, $route, $args, StatusCode::TEMPORARY_REDIRECT, $methods);
    }

    /**
     * @param non-empty-string $path
     * @param non-empty-string|\Stringable $location
     * @param iterable<MethodInterface> $methods
     * @return Group
     */
    public function permanent(string $path, string|\Stringable $location, iterable $methods = []): Group
    {
        return $this->redirectToUri($path, $location, StatusCode::PERMANENT_REDIRECT, $methods);
    }

    /**
     * @param non-empty-string $path
     * @param string $route
     * @param iterable<string, string> $args
     * @param iterable<MethodInterface> $methods
     * @return Group
     * @throws RouteGeneratorExceptionInterface
     */
    public function permanentTo(string $path, string $route, iterable $args = [], iterable $methods = []): Group
    {
        return $this->redirectToRoute($path, $route, $args, StatusCode::PERMANENT_REDIRECT, $methods);
    }

    /**
     * @param non-empty-string $path
     * @param non-empty-string|\Stringable $location
     * @param iterable<MethodInterface> $methods
     * @return Group
     */
    public function moved(string $path, string|\Stringable $location, iterable $methods = []): Group
    {
        return $this->redirectToUri($path, $location, StatusCode::MOVED_PERMANENTLY, $methods);
    }

    /**
     * @param non-empty-string $path
     * @param string $route
     * @param iterable<string, string> $args
     * @param iterable<MethodInterface> $methods
     * @return Group
     * @throws RouteGeneratorExceptionInterface
     */
    public function movedTo(string $path, string $route, iterable $args = [], iterable $methods = []): Group
    {
        return $this->redirectToRoute($path, $route, $args, StatusCode::MOVED_PERMANENTLY, $methods);
    }

    /**
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Group
     */
    public function any(string $path, mixed $handler = null): Group
    {
        return $this->oneOf(Method::cases(), $path, $handler);
    }

    /**
     * @param iterable<MethodInterface> $methods
     * @param non-empty-string $path
     * @param mixed $handler
     * @return Group
     */
    public function oneOf(iterable $methods, string $path, mixed $handler = null): Group
    {
        return $this->group(function (Router $router) use ($methods, $path, $handler) {
            foreach ($methods as $method) {
                $router->make($method, $path, $handler);
            }

            if ($router->count() === 0) {
                $router->oneOf(Method::cases(), $path, $handler);
            }
        });
    }

    /**
     * @param (callable(Router): taskInterface)|null $group
     * @return Group
     */
    public function group(callable $group = null): Group
    {
        $child = $this->new();

        if ($group !== null) {
            $group($child);
        }

        try {
            return new Group($child->routes);
        } finally {
            foreach ($child->routes as $route) {
                $this->add($route);
            }
        }
    }

    /**
     * @return $this
     */
    protected function new(): self
    {
        return new self($this->responses, $this->uris, $this->reader);
    }

    /**
     * @param class-string $class
     * @return Group
     * @throws BadRouteDefinitionException
     */
    public function import(string $class): Group
    {
        $routes = [...$this->reader->read($class)];

        foreach ($routes as $route) {
            $this->add($route);
        }

        return new Group($routes);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->routes);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return \count($this->routes);
    }

    /**
     * {@inheritDoc}
     */
    public function find(string $name): ?RouteInterface
    {
        foreach ($this->routes as $route) {
            if ($route->getName() === $name) {
                return $route;
            }
        }

        return null;
    }

    /**
     * @return void
     */
    private function clear(): void
    {
        $this->dispatcher = null;
    }

    /**
     * @return void
     * @throws BadRouteDefinitionException
     */
    private function compileIfNotCompiled(): void
    {
        if ($this->dispatcher === null) {
            $this->dispatcher = $this->compiler->compile($this->routes);
        }
    }
}
