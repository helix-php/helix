<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\EventDispatcher;

use Helix\Contracts\EventDispatcher\EventInterface;

/**
 * @template T of object|null
 * @template-implements EventInterface<T>
 */
abstract class Event implements EventInterface
{
    /**
     * @var int|float
     * @psalm-readonly
     */
    public int|float $time;

    /**
     * @param T $target
     * @param int|float|null $time
     */
    public function __construct(
        public readonly ?object $target = null,
        int|float|null $time = null,
    ) {
        $this->time = $time ?? \microtime(true);
    }
}
