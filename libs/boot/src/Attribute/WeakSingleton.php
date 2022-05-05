<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot\Attribute;

use Helix\Container\Container;
use Helix\Container\Definition\DefinitionInterface;
use Helix\Container\Definition\WeakSingletonDefinition;

#[\Attribute(\Attribute::TARGET_METHOD)]
final class WeakSingleton extends ServiceDefinition
{
    /**
     * {@inheritDoc}
     */
    public function create(string $id, Container $container, callable $declarator): DefinitionInterface
    {
        return new WeakSingletonDefinition($container->detach($declarator));
    }
}
