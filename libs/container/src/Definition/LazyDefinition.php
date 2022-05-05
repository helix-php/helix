<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\Definition;

/**
 * @template TDefinition of object
 * @template-extends Definition<TDefinition>
 */
abstract class LazyDefinition extends Definition
{
    /**
     * @param \Closure():TDefinition $initializer
     */
    public function __construct(
        private readonly \Closure $initializer,
    ) {
    }

    /**
     * @return TDefinition
     */
    protected function initialize(): object
    {
        return ($this->initializer)();
    }
}
