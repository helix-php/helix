<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\ParamResolver;

use Helix\Contracts\Memoizable\MemoizableInterface;
use ReflectionParameter as FunctionsList;

/**
 * @psalm-type ParametersList = array<\ReflectionParameter>
 * @psalm-type FunctionsList = array<non-empty-string, ParametersList>
 *
 * @template-implements ReaderInterface<\ReflectionParameter>
 *
 * @internal MemoizableReader is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Container
 */
class MemoizableReader implements ReaderInterface, MemoizableInterface
{
    /**
     * @var FunctionsList
     */
    private array $functions = [];

    /**
     * @var \WeakMap<\Closure, ParametersList>
     */
    private \WeakMap $callables;

    /**
     * @param ReaderInterface $reader
     */
    public function __construct(
        private readonly ReaderInterface $reader = new StatelessReader(),
    ) {
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

            $this->fromMethod($reflection->getName(), $method->getName());
        }
    }

    /**
     * {@inheritDoc}
     */
    public function fromFunction(string $name): iterable
    {
        if (!isset($this->functions[$name])) {
            /** @psalm-suppress PropertyTypeCoercion */
            return $this->functions[$name] = $this->reader->fromFunction($name);
        }

        return $this->functions[$name];
    }

    /**
     * {@inheritDoc}
     */
    public function fromMethod(string|object $class, string $name): iterable
    {
        if (\is_object($class)) {
            $class = $class::class;
        }

        $signature = \trim($class, '\\') . '::' . $name;

        if (!isset($this->functions[$signature])) {
            return $this->functions[$signature] = $this->reader->fromMethod($class, $name);
        }

        return $this->functions[$signature];
    }

    /**
     * {@inheritDoc}
     */
    public function fromCallable(callable $callable): iterable
    {
        return match (true) {
            $callable instanceof \Closure => $this->fromClosure($callable),
            \is_string($callable) => $this->fromFunction($callable),
            default => $this->fromClosure($callable(...)),
        };
    }

    /**
     * {@inheritDoc}
     */
    public function fromClosure(\Closure $closure): iterable
    {
        if (!isset($this->callables[$closure])) {
            return $this->callables[$closure] = $this->reader->fromClosure($closure);
        }

        return $this->callables[$closure];
    }

    /**
     * {@inheritDoc}
     */
    public function free(): void
    {
        $this->functions = [];
        $this->callables = new \WeakMap();
    }
}
