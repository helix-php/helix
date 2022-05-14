<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Container;

/**
 * @template-implements \IteratorAggregate<non-empty-string, DefinitionInterface>
 */
interface RepositoryInterface extends \IteratorAggregate, \Countable
{
    /**
     * Finds a service definition of the container by its identifier
     * and returns it.
     *
     * @template TService of object
     *
     * @param non-empty-string|class-string<TService> $id
     * @return DefinitionInterface<TService>
     */
    public function definition(string $id): DefinitionInterface;
}
