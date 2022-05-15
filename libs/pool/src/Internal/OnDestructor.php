<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Pool\Internal;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Pool
 *
 * @template TEntry of object
 */
final class OnDestructor
{
    /**
     * @var \Closure(TEntry):void
     */
    private \Closure $listener;

    /**
     * @param TEntry $entry
     * @param \Closure(TEntry):void $onRelease
     */
    private function __construct(
        private readonly object $entry,
        \Closure $onRelease,
    ) {
        $this->listener = $onRelease;
    }

    /**
     * @return TEntry
     */
    public function getEntry(): object
    {
        return $this->entry;
    }

    /**
     * @template TIn of object
     *
     * @param TIn $entry
     * @param callable(TIn):void $onRelease
     * @return self<TIn>
     */
    public static function create(object $entry, callable $onRelease): self
    {
        return new self($entry, $onRelease(...));
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        ($this->listener)($this->entry);
    }
}
