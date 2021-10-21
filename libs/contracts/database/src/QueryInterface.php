<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Database;

/**
 * @psalm-type ParamKey = string|positive-int|0
 * @psalm-type ParamValue = scalar
 *
 * @template-extends \ArrayAccess<ParamKey, ParamValue>
 * @template-extends \IteratorAggregate<ParamKey, ParamValue>
 */
interface QueryInterface extends \Stringable, \ArrayAccess, \IteratorAggregate
{
    /**
     * Return an instance with the provided value replacing the specified
     * query parameter.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the query, and MUST return an instance that has the
     * new and/or updated query parameter.
     *
     * @psalm-immutable
     * @param ParamKey $param
     * @param ParamValue $value
     * @return static
     */
    public function with(string|int $param, mixed $value): static;

    /**
     * Return an instance without the provided value.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the query, and MUST return an instance that has the
     * new and/or updated query parameter.
     *
     * @psalm-immutable
     * @param ParamKey $param
     * @return static
     */
    public function without(string|int $param): static;

    /**
     * @return non-empty-string
     */
    public function __toString(): string;
}
