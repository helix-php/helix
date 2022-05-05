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
final class InstanceDefinition extends Definition
{
    /**
     * @param TDefinition $instance
     */
    public function __construct(
        private readonly object $instance,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(): object
    {
        return $this->instance;
    }
}
