<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Container;


use Helix\Contracts\Container\Definition\DefinitionInterface;
use Helix\Contracts\Container\Definition\DefinitionRegistrarInterface;

interface RegistrarInterface
{
    /**
     * @template TIdentifier as object
     *
     * @param non-empty-string|class-string<TIdentifier> $id
     * @param DefinitionInterface<TIdentifier> $service
     * @return DefinitionRegistrarInterface
     */
    public function define(string $id, DefinitionInterface $service): DefinitionRegistrarInterface;
}
