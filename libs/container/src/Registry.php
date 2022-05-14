<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container;

use Helix\Container\Definition\DefinitionInterface;
use Helix\Container\Definition\DefinitionRegistrar;
use Helix\Container\Definition\DefinitionRegistrarInterface;
use Helix\Container\Exception\ServiceNotFoundException;
use Psr\Container\ContainerInterface;

final class Registry implements
    RegistrarInterface,
    ContainerInterface,
    RepositoryInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_NOT_FOUND = 'Service [%s] has not been registered';

    /**
     * @var array<non-empty-string, DefinitionInterface>
     */
    private array $definitions = [];

    /**
     * @var array<non-empty-string, non-empty-string>
     */
    private array $aliases = [];

    /**
     * @param non-empty-string $id
     * @return non-empty-string
     */
    public function concrete(string $id): string
    {
        while (isset($this->aliases[$id])) {
            if (isset($this->definitions[$id])) {
                return $id;
            }

            $id = $this->aliases[$id];
        }

        return $id;
    }

    /**
     * @param non-empty-string $id
     * @return bool
     */
    public function has(string $id): bool
    {
        return isset($this->definitions[$id]) || isset($this->aliases[$id]);
    }

    /**
     * Returns the definition for the registered service.
     *
     * @template T as object
     *
     * @param non-empty-string|class-string<T>|interface-string<T> $id
     * @return DefinitionInterface<T>
     * @throws ServiceNotFoundException
     * @psalm-suppress MixedReturnTypeCoercion
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function get(string $id): DefinitionInterface
    {
        $id = $this->concrete($id);

        if (!isset($this->definitions[$id])) {
            $message = \sprintf(self::ERROR_NOT_FOUND, $id);
            throw new ServiceNotFoundException($id, $message);
        }

        return $this->definitions[$id];
    }

    /**
     * {@inheritDoc}
     */
    public function define(string $id, DefinitionInterface $service): DefinitionRegistrarInterface
    {
        $this->definitions[$id] = $service;

        return new DefinitionRegistrar($id, $this);
    }

    /**
     * {@inheritDoc}
     */
    public function alias(string $id, string $alias): void
    {
        $this->aliases[$alias] = $id;
    }

    /**
     * {@inheritDoc}
     * @throws ServiceNotFoundException
     */
    public function getIterator(): \Traversable
    {
        yield from $this->definitions;

        foreach ($this->aliases as $alias => $_) {
            yield $alias => $this->get($alias);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return \count($this->definitions) + \count($this->aliases);
    }
}
