<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router;

use Helix\Router\Internal\Normalizer;

final class Group implements \IteratorAggregate, \Countable
{
    /**
     * @var iterable<Route>
     */
    private array $routes;

    /**
     * @param iterable<Route> $routes
     */
    public function __construct(iterable $routes)
    {
        $this->routes = [...$routes];
    }

    /**
     * @param callable(Route): void $each
     * @return $this
     */
    public function each(callable $each): self
    {
        foreach ($this->routes as $route) {
            $each($route);
        }

        return $this;
    }

    /**
     * @param string $name
     * @param string $pattern
     * @return $this
     */
    public function where(string $name, string $pattern): self
    {
        return $this->each(static fn (Route $route) =>
            $route->where($name, $pattern)
        );
    }

    /**
     * @param mixed ...$middleware
     * @return $this
     */
    public function through(mixed ...$middleware): self
    {
        return $this->each(static fn (Route $route) =>
            $route->through(...$middleware)
        );
    }

    /**
     * @param callable $action
     * @return $this
     */
    public function then(callable $action): self
    {
        return $this->each(static fn (Route $route) =>
            $route->then($action)
        );
    }

    /**
     * @param string $prefix
     * @param bool $concat
     * @return $this
     */
    public function prefix(string $prefix, bool $concat = false): self
    {
        return $this->each(static fn (Route $route) =>
            $route->located(Normalizer::chunks([$prefix, $route->getPath()], $concat))
        );
    }

    /**
     * @param string $suffix
     * @param bool $concat
     * @return $this
     */
    public function suffix(string $suffix, bool $concat = true): self
    {
        return $this->each(static fn (Route $route) =>
            $route->located(Normalizer::chunks([$route->getPath(), $suffix], $concat))
        );
    }

    /**
     * @return \Traversable<Route>
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->routes);
    }

    /**
     * @return positive-int|0
     */
    public function count(): int
    {
        return \count($this->routes);
    }
}
