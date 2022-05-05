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
final class FactoryDefinition extends LazyDefinition
{
    /**
     * {@inheritDoc}
     */
    public function resolve(): object
    {
        return $this->initialize();
    }
}
