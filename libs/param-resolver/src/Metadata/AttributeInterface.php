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
 * @template T of object
 */
interface AttributeInterface
{
    /**
     * @return bool
     */
    public function isExists(): bool;

    /**
     * @return class-string<T>
     */
    public function getName(): string;

    /**
     * @return iterable<array-key, mixed>
     */
    public function getArguments(): iterable;

    /**
     * @return \ReflectionClass<T>
     */
    public function getReflection(): \ReflectionClass;

    /**
     * @return T
     */
    public function new(): object;

    /**
     * @param class-string|interface-string $target
     * @return bool
     */
    public function instanceOf(string $target): bool;
}
