<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router\Internal;

use FastRoute\BadRouteException;
use FastRoute\DataGenerator\GroupCountBased as GroupCountBasedGenerator;
use FastRoute\Dispatcher;
use FastRoute\Dispatcher\GroupCountBased as GroupCountBasedDispatcher;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;
use Helix\Contracts\Router\RouteInterface;
use Helix\Router\Exception\BadRouteDefinitionException;

/**
 * @internal Compiler is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Router
 */
final class Compiler
{
    /**
     * @var string
     */
    private const PCRE_OPTION = '/\{\h*(\w+)\h*\}/u';

    /**
     * @var string
     */
    private const ERROR_BAD_ROUTE_STARTS_DIGIT =
        'Route parameter name "%s" cannot start with a digit in route "%s" at offset %d';

    /**
     * @param iterable<RouteInterface> $routes
     * @return Dispatcher
     * @throws BadRouteDefinitionException
     */
    public function compile(iterable $routes): Dispatcher
    {
        $collector = new RouteCollector(new Std(), new GroupCountBasedGenerator());

        /** @var mixed $index */
        foreach ($routes as $index => $route) {
            try {
                $method = $route->getMethod();
                $collector->addRoute($method->getName(), $this->compileRoute($route), $index);
            } catch (BadRouteException $e) {
                throw new BadRouteDefinitionException($e->getMessage(), (int)$e->getCode());
            }
        }

        return new GroupCountBasedDispatcher($collector->getData());
    }

    /**
     * @param RouteInterface $route
     * @return string
     */
    private function compileRoute(RouteInterface $route): string
    {
        return $this->replace($route, $route->getPath(), self::PCRE_OPTION, [$this, 'compileOption']);
    }

    /**
     * @param RouteInterface $route
     * @param string $subj
     * @param non-empty-string $pattern
     * @param callable $handler
     * @return string
     */
    private function replace(RouteInterface $route, string $subj, string $pattern, callable $handler): string
    {
        $flags = \PREG_OFFSET_CAPTURE | \PREG_SET_ORDER;

        $callback = static function (array $matches) use ($route, $handler): string {
            return (string)$handler($route, $matches[1]);
        };

        return \preg_replace_callback($pattern, $callback, $subj, -1, $count, $flags);
    }

    /**
     * @param RouteInterface $route
     * @param array{non-empty-string, int} $matches
     * @return string
     * @throws BadRouteDefinitionException
     */
    private function compileOption(RouteInterface $route, array $matches): string
    {
        [$name, $offset] = $matches;

        if (\ctype_digit($name[0])) {
            $definition = $route->getName() ?? $route->getPath();
            $message = \sprintf(self::ERROR_BAD_ROUTE_STARTS_DIGIT, $name, $definition, $offset);
            throw new BadRouteDefinitionException($message);
        }

        $parameters = $route->getParameters();

        return \sprintf('{%s:%s}', $name, $parameters[$name] ?? '[^/]+');
    }
}
