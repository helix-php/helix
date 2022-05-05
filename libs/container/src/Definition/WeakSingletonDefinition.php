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
 * @template-extends LazyDefinition<TDefinition>
 */
final class WeakSingletonDefinition extends LazyDefinition
{
    /**
     * @var \WeakReference<TDefinition>|null
     */
    private ?\WeakReference $ref = null;

    /**
     * @param \Closure():TDefinition $initializer
     */
    public function __construct(\Closure $initializer)
    {
        parent::__construct($initializer);
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(): object
    {
        if ($result = $this->ref?->get()) {
            return $result;
        }

        $this->ref = \WeakReference::create(
            $result = $this->initialize(),
        );

        return $result;
    }
}
