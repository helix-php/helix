<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata;

/**
 * @psalm-type ParametersList = array<Parameter>
 * @psalm-type FunctionsList = array<non-empty-string, ParametersList>
 */
class Repository implements RepositoryInterface
{
    /**
     * @var FunctionsList
     */
    private array $functions = [];

    /**
     * @var \WeakMap<\Closure, ParametersList>
     */
    private \WeakMap $callables;

    public function __construct()
    {
        $this->callables = new \WeakMap();
    }

    /**
     * @param class-string|object $class
     * @return void
     * @throws \ReflectionException
     */
    public function preload(string|object $class): void
    {
        $reflection = \is_object($class)
            ? new \ReflectionObject($class)
            : new \ReflectionClass($class)
        ;

        foreach ($reflection->getMethods() as $method) {
            if ($method->isPrivate()) {
                continue;
            }

            $this->byMethod($reflection->getName(), $method->getName());
        }
    }

    /**
     * {@inheritDoc}
     * @throws \ReflectionException
     */
    public function byFunction(string $name): iterable
    {
        if (!isset($this->functions[$name])) {
            return $this->functions[$name] = $this->fromReflection(
                new \ReflectionFunction($name)
            );
        }

        return $this->functions[$name];
    }

    /**
     * {@inheritDoc}
     * @throws \ReflectionException
     */
    public function byMethod(string|object $class, string $name): iterable
    {
        if (\is_object($class)) {
            $class = $class::class;
        }

        $signature = \trim($class, '\\') . '::' . $name;

        if (!isset($this->functions[$signature])) {
            return $this->functions[$signature] = $this->fromReflection(
                new \ReflectionMethod($class, $name)
            );
        }

        return $this->functions[$signature];
    }

    /**
     * {@inheritDoc}
     * @throws \ReflectionException
     */
    public function byCallable(callable $callable): iterable
    {
        $closure = $callable(...);

        if (!isset($this->callables[$closure])) {
            return $this->callables[$closure] = $this->fromReflection(
                new \ReflectionFunction($closure)
            );
        }

        return $this->callables[$closure];
    }

    /**
     * @param \ReflectionFunctionAbstract $fun
     * @return ParametersList
     */
    private function fromReflection(\ReflectionFunctionAbstract $fun): array
    {
        $result = [];

        foreach ($fun->getParameters() as $parameter) {
            $result[] = Parameter::fromReflection($parameter);
        }

        return $result;
    }
}
