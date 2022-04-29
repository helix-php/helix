<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata;

interface RepositoryInterface
{
    /**
     * @param non-empty-string $name
     * @return iterable<Parameter>
     */
    public function byFunction(string $name): iterable;

    /**
     * @param class-string|object $class
     * @param non-empty-string $name
     * @return iterable<Parameter>
     */
    public function byMethod(string|object $class, string $name): iterable;

    /**
     * @param callable $callable
     * @return iterable<Parameter>
     */
    public function byCallable(callable $callable): iterable;
}
