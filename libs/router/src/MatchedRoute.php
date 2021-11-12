<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router;

use Helix\Contracts\Http\Method\MethodInterface;
use Helix\Contracts\Router\MatchedRouteInterface;
use Helix\Contracts\Router\RouteInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * @package router
 */
class MatchedRoute implements MatchedRouteInterface
{
    /**
     * @param RouteInterface $route
     * @param ServerRequestInterface $request
     * @param array<string, mixed> $arguments
     */
    public function __construct(
        private RouteInterface $route,
        private ServerRequestInterface $request,
        private array $arguments = []
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getPath(): string
    {
        return $this->route->getPath();
    }

    /**
     * {@inheritDoc}
     */
    public function getUri(): UriInterface
    {
        return $this->request->getUri();
    }

    /**
     * {@inheritDoc}
     */
    public function getServerRequest(): ServerRequestInterface
    {
        return $this->request;
    }

    /**
     * {@inheritDoc}
     */
    public function getHandler(): string|callable
    {
        return $this->route->getHandler();
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod(): MethodInterface
    {
        return $this->route->getMethod();
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return $this->route->getParameters();
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): ?string
    {
        return $this->route->getName();
    }

    /**
     * {@inheritDoc}
     */
    public function getMiddleware(): array
    {
        return $this->route->getMiddleware();
    }

    /**
     * {@inheritDoc}
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoute(): RouteInterface
    {
        return $this->route;
    }
}
