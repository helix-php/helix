<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver;

use Helix\ParamResolver\Exception\NotResolvableException;
use Helix\ParamResolver\Exception\SignatureException;
use Helix\ParamResolver\Resolver\ResolverInterface;

interface SignatureResolverInterface
{
    /**
     * @param callable-string $name
     * @param iterable<array-key, ResolverInterface> $resolvers
     * @return iterable
     * @throws NotResolvableException
     * @throws SignatureException
     */
    public function byFunction(string $name, iterable $resolvers = []): iterable;

    /**
     * @param class-string|object $class
     * @param non-empty-string $name
     * @param iterable<array-key, ResolverInterface> $resolvers
     * @return iterable
     * @throws NotResolvableException
     * @throws SignatureException
     */
    public function byMethod(string|object $class, string $name, iterable $resolvers = []): iterable;

    /**
     * @param callable $callable
     * @param iterable<array-key, ResolverInterface> $resolvers
     * @return iterable
     * @throws NotResolvableException
     * @throws SignatureException
     */
    public function byCallable(callable $callable, iterable $resolvers = []): iterable;
}
