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
use Helix\Contracts\Router\RouteInterface;
use Helix\Http\Method\Method;
use Helix\Router\Internal\Normalizer;

/**
 * @package router
 */
class Route implements RouteInterface
{
    /**
     * @var non-empty-string|null
     */
    protected ?string $name = null;

    /**
     * @var array<non-empty-string, string>
     */
    protected array $parameters = [];

    /**
     * @var non-empty-string
     */
    protected string $path;

    /**
     * @var mixed
     */
    private mixed $handler;

    /**
     * @var array
     */
    private array $middleware = [];

    /**
     * @param MethodInterface $method
     * @param non-empty-string $path
     * @param mixed $handler
     */
    public function __construct(
        string $path = '/',
        mixed $handler = null,
        protected MethodInterface $method = Method::GET,
    ) {
        $this->path = Normalizer::path($path);

        /** @psalm-suppress MissingClosureReturnType */
        $this->handler = $handler ?? (static fn() => null);
    }

    /**
     * {@inheritDoc}
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * {@inheritDoc}
     */
    public function getHandler(): mixed
    {
        return $this->handler;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod(): MethodInterface
    {
        return $this->method;
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getMiddleware(): iterable
    {
        return $this->middleware;
    }

    /**
     * {@inheritDoc}
     */
    public function located(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function matched(MethodInterface|string $method): self
    {
        if (\is_string($method)) {
            $method = Method::create($method);
        }

        $this->method = $method;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function then(mixed $action): self
    {
        $this->handler = $action;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function where(string $name, string $pattern): self
    {
        assert($name !== '');
        assert($pattern !== '');

        $this->parameters[$name] = $pattern;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function as(?string $name): self
    {
        $this->name = $name ?: null;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function through(mixed ...$middleware): self
    {
        foreach ($middleware as $class) {
            $this->middleware[] = $class;
        }

        return $this;
    }
}
