<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Reader;

/**
 * @template-implements ReaderInterface<\ReflectionParameter>
 */
class StatelessReader implements ReaderInterface
{
    /**
     * @param callable-string $name
     * @return iterable<\ReflectionParameter>
     * @throws \ReflectionException
     */
    public function fromFunction(string $name): iterable
    {
        return (new \ReflectionFunction($name))->getParameters();
    }

    /**
     * @param class-string|object $class
     * @param non-empty-string $name
     * @return iterable<\ReflectionParameter>
     * @throws \ReflectionException
     */
    public function fromMethod(string|object $class, string $name): iterable
    {
        if (\is_object($class)) {
            $class = $class::class;
        }

        return (new \ReflectionMethod($class, $name))->getParameters();
    }

    /**
     * @param callable $callable
     * @return iterable<\ReflectionParameter>
     * @throws \ReflectionException
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
     * @param \Closure $closure
     * @return iterable<\ReflectionParameter>
     * @throws \ReflectionException
     */
    public function fromClosure(\Closure $closure): iterable
    {
        return (new \ReflectionFunction($closure))->getParameters();
    }
}
