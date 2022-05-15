<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Pool;

/**
 * @template TEntry of object
 * @template-implements InstantiatorInterface<TEntry>
 */
final class ClosureInstantiator implements InstantiatorInterface
{
    /**
     * @param \Closure(TEntry|null):TEntry $instantiator
     */
    public function __construct(
        private readonly \Closure $instantiator,
    ) {
    }

    /**
     * @param \Closure(TEntry|null):TEntry $create
     * @return self
     */
    public static function new(\Closure $creation): self
    {
        return new self($creation);
    }

    /**
     * {@inheritDoc}
     */
    public function create(?object $previous): object
    {
        return ($this->instantiator)($previous);
    }
}
