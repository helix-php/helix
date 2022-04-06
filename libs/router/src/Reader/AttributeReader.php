<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router\Reader;

use Helix\Contracts\Router\RouteInterface;
use Helix\Router\Attribute\Group;
use Helix\Router\Attribute\Route as RouteAttribute;
use Helix\Router\Exception\BadRouteDefinitionException;
use Helix\Router\Internal\Normalizer;
use Helix\Router\Route;

class AttributeReader implements ReaderInterface
{
    /**
     * {@inheritDoc}
     */
    public function read(string $class): iterable
    {
        try {
            $reflection = new \ReflectionClass($class);
        } catch (\ReflectionException $e) {
            throw new BadRouteDefinitionException($e->getMessage(), (int)$e->getCode(), $e);
        }

        yield from $this->methods($reflection, $this->group($reflection));
    }

    /**
     * @param \ReflectionClass $class
     * @param Group $group
     * @return iterable<RouteInterface>
     * @throws BadRouteDefinitionException
     */
    private function methods(\ReflectionClass $class, Group $group): iterable
    {
        foreach ($class->getMethods() as $method) {
            yield from $this->method($class, $method, $group);
        }
    }

    /**
     * @param \ReflectionClass $class
     * @param \ReflectionMethod $method
     * @param Group $group
     * @return iterable<RouteInterface>
     * @throws BadRouteDefinitionException
     */
    private function method(\ReflectionClass $class, \ReflectionMethod $method, Group $group): iterable
    {
        $attributes = $method->getAttributes(RouteAttribute::class, \ReflectionAttribute::IS_INSTANCEOF);

        if ($attributes === []) {
            return [];
        }

        if (! $method->isPublic()) {
            $message = \vsprintf('Route http-method %s::%s must be public', [
                $class->getName(),
                $method->getName(),
            ]);

            throw new BadRouteDefinitionException($message);
        }

        foreach ($attributes as $attribute) {
            yield $this->make($this->handler($class, $method), $group, $attribute->newInstance());
        }
    }

    /**
     * @param \ReflectionClass $class
     * @param \ReflectionMethod $method
     * @return non-empty-string|callable
     */
    private function handler(\ReflectionClass $class, \ReflectionMethod $method): string|callable
    {
        if ($method->isStatic()) {
            return \Closure::fromCallable([$class->getName(), $method->getName()]);
        }

        return $class->getName() . '@' . $method->getName();
    }

    /**
     * @param non-empty-string|callable $handler
     * @param Group $group
     * @param RouteAttribute $route
     * @return RouteInterface
     */
    private function make(string|callable $handler, Group $group, RouteAttribute $route): RouteInterface
    {
        $result = new Route($this->path($group, $route), $handler, $route->method);

        foreach ($route->where as $name => $pcre) {
            $result->where($name, $pcre);
        }

        foreach ($group->middleware as $middleware) {
            $result->through($middleware);
        }

        foreach ($route->middleware as $middleware) {
            $result->through($middleware);
        }

        return $result->as($route->as);
    }

    /**
     * @param Group $group
     * @param RouteAttribute $route
     * @return non-empty-string
     */
    private function path(Group $group, RouteAttribute $route): string
    {
        $prefix = $group->prefix ? Normalizer::path($group->prefix) : '';
        $suffix = $group->suffix ? Normalizer::path($group->suffix, false) : '';

        return $prefix . Normalizer::path($route->path) . $suffix;
    }

    /**
     * @param \ReflectionClass $reflection
     * @return Group
     */
    private function group(\ReflectionClass $reflection): Group
    {
        $attributes = $reflection->getAttributes(Group::class, \ReflectionAttribute::IS_INSTANCEOF);

        foreach ($attributes as $attribute) {
            return $attribute->newInstance();
        }

        return new Group();
    }
}
