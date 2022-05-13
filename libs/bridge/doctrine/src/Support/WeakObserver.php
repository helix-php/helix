<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\Support;

/**
 * @template T of object
 */
final class WeakObserver
{
    /**
     * @var \Closure(T):void
     */
    private \Closure $listener;

    /**
     * @param T $reference
     * @param \Closure(T):void $onRelease
     */
    private function __construct(
        public readonly object $reference,
        \Closure $onRelease,
    ) {
        $this->listener = $onRelease;
    }

    /**
     * @return T
     */
    public function getReference(): object
    {
        return $this->reference;
    }

    /**
     * @template TIn of object
     *
     * @param TIn $reference
     * @param callable(TIn):void $onRelease
     * @return self<TIn>
     */
    public static function create(object $reference, callable $onRelease): self
    {
        return new self($reference, $onRelease(...));
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        ($this->listener)($this->reference);
    }
}
