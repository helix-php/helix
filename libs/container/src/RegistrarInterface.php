<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container;

use Helix\Contracts\Container\Definition\DefinitionRegistrarInterface;
use Helix\Contracts\Container\RegistrarInterface as RegistrarContractInterface;

interface RegistrarInterface extends RegistrarContractInterface
{
    /**
     * @param class-string $id
     * @param class-string|string $alias
     * @return $this
     */
    public function alias(string $id, string $alias): self;

    /**
     * @param object $entry
     * @return DefinitionRegistrarInterface
     */
    public function instance(object $entry): DefinitionRegistrarInterface;

    /**
     * @param class-string $id
     * @param callable|class-string|null $declarator
     * @return DefinitionRegistrarInterface
     */
    public function factory(string $id, callable|string $declarator = null): DefinitionRegistrarInterface;

    /**
     * @param class-string $id
     * @param callable|class-string|null $declarator
     * @return DefinitionRegistrarInterface
     */
    public function singleton(string $id, callable|string $declarator = null): DefinitionRegistrarInterface;

    /**
     * @param class-string $id
     * @param callable|class-string|null $declarator
     * @return DefinitionRegistrarInterface
     */
    public function weakSingleton(string $id, callable|string $declarator = null): DefinitionRegistrarInterface;

    /**
     * @template T of object
     *
     * @param class-string<T> $id
     * @param T $entry
     * @return DefinitionRegistrarInterface
     */
    public function cloneable(string $id, object $entry): DefinitionRegistrarInterface;
}
