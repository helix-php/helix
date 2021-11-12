<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\Definition;

use Helix\Contracts\Container\Definition\DefinitionInterface;

abstract class Definition implements DefinitionInterface
{
    /**
     * @param callable|array|null $resolver
     * @return object
     */
    abstract public function resolve(callable|array $resolver = null): object;
}
