<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Container;

use Helix\Container\Definition\DefinitionRegistrarInterface;

interface RegistrarInterface
{
    /**
     * Creates an alias for an existing or added service in the future.
     *
     * @template TService of object
     *
     * @param non-empty-string|class-string<TService> $id
     * @param non-empty-string|class-string<TService> $alias
     * @return void
     */
    public function alias(string $id, string $alias): void;

    /**
     * Registers a definition by it's ID.
     *
     * @template TService as object
     *
     * @param non-empty-string|class-string<TService> $id
     * @param DefinitionInterface<TService> $service
     * @return DefinitionRegistrarInterface
     */
    public function define(string $id, DefinitionInterface $service): DefinitionRegistrarInterface;
}
