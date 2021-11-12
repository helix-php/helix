<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\Definition;

use Helix\Container\Container;

final class WeakSingletonDefinition extends LazyDefinition
{
    /**
     * @var \WeakReference
     */
    private \WeakReference $instance;

    /**
     * {@inheritDoc}
     */
    public function __construct(string $id, Container $container, callable $declarator)
    {
        $this->instance = \WeakReference::create(null);

        parent::__construct($id, $container, $declarator);
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(callable|array $resolver = null): object
    {
        $this->resolving();

        try {
            if ($instance = $this->instance->get()) {
                return $instance;
            }

            return $this->instance = \WeakReference::create(($this->declarator)($resolver));
        } finally {
            $this->resolved();
        }
    }
}
