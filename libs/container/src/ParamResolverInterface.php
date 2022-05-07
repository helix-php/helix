<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container;

use Helix\Container\Exception\ParamNotResolvableException;
use Helix\Container\Exception\SignatureException;
use Helix\Container\ParamResolver\ReaderInterface;
use Helix\Container\ParamResolver\ValueResolverInterface;

/**
 * @psalm-type ResolversList = iterable<array-key, ValueResolverInterface>
 *
 * @template-implements ReaderInterface<mixed>
 */
interface ParamResolverInterface extends ReaderInterface
{
    /**
     * @param callable-string $name
     * @param ResolversList $resolvers
     * @return iterable
     * @throws ParamNotResolvableException
     * @throws SignatureException
     */
    public function fromFunction(string $name, iterable $resolvers = []): iterable;

    /**
     * @param class-string|object $class
     * @param non-empty-string $name
     * @param ResolversList $resolvers
     * @return iterable
     * @throws ParamNotResolvableException
     * @throws SignatureException
     */
    public function fromMethod(string|object $class, string $name, iterable $resolvers = []): iterable;

    /**
     * @param \Closure $closure
     * @param ResolversList $resolvers
     * @return iterable
     */
    public function fromClosure(\Closure $closure, iterable $resolvers = []): iterable;

    /**
     * @param callable $callable
     * @param ResolversList $resolvers
     * @return iterable
     * @throws ParamNotResolvableException
     * @throws SignatureException
     */
    public function fromCallable(callable $callable, iterable $resolvers = []): iterable;
}
