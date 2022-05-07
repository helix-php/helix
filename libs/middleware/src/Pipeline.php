<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Middleware;

use Helix\Contracts\Middleware\MutablePipelineInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class Pipeline implements MutablePipelineInterface
{
    /**
     * @var array<MiddlewareInterface>
     */
    private array $before = [];

    /**
     * @var array<MiddlewareInterface>
     */
    private array $after = [];

    /**
     * @param iterable<MiddlewareInterface> $middleware
     */
    public function __construct(iterable $middleware = [])
    {
        foreach ($middleware as $instance) {
            $this->append($instance);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function through(MiddlewareInterface ...$middleware): self
    {
        $self = clone $this;
        $self->after = [...$this->after, ...$middleware];

        return $self;
    }

    /**
     * {@inheritDoc}
     */
    public function append(MiddlewareInterface $middleware): self
    {
        $this->after[] = $middleware;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function prepend(MiddlewareInterface $middleware): self
    {
        \array_unshift($this->before, $middleware);

        return $this;
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $handler = $this->reduce($handler);

        return $handler->handle($request);
    }

    /**
     * @param MiddlewareInterface $middleware
     * @param RequestHandlerInterface $next
     * @return RequestHandlerInterface
     */
    protected function next(MiddlewareInterface $middleware, RequestHandlerInterface $next): RequestHandlerInterface
    {
        return new Next($middleware, $next);
    }

    /**
     * @param RequestHandlerInterface $handler
     * @return RequestHandlerInterface
     */
    private function reduce(RequestHandlerInterface $handler): RequestHandlerInterface
    {
        foreach (\array_reverse($this->after) as $middleware) {
            $handler = $this->next($middleware, $handler);
        }

        foreach (\array_reverse($this->before) as $middleware) {
            $handler = $this->next($middleware, $handler);
        }

        return $handler;
    }
}
