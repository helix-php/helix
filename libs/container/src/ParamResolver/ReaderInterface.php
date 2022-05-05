<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\ParamResolver;

/**
 * @template T of mixed
 */
interface ReaderInterface
{
    /**
     * @param callable-string $name
     * @return iterable<T>
     */
    public function fromFunction(string $name): iterable;

    /**
     * @param class-string|object $class
     * @param non-empty-string $name
     * @return iterable<T>
     */
    public function fromMethod(string|object $class, string $name): iterable;

    /**
     * @param \Closure $closure
     * @return iterable<T>
     */
    public function fromClosure(\Closure $closure): iterable;

    /**
     * @param callable $callable
     * @return iterable<T>
     */
    public function fromCallable(callable $callable): iterable;
}
