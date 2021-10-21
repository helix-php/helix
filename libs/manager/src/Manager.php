<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Manager;

use Helix\Contracts\Memoizable\MemoizableInterface;
use Helix\Contracts\Manager\ManagerInterface;
use Helix\Manager\Exception\EmptyManagerException;
use Helix\Manager\Exception\EntryNotFoundException;
use Helix\Manager\Exception\InitializationException;

/**
 * @template T of mixed
 * @template-implements ManagerInterface<T>
 */
class Manager implements ManagerInterface, MemoizableInterface
{
    /**
     * @var non-empty-string
     */
    protected const ERROR_EMPTY_MANAGER = 'Can not get object from empty manager';

    /**
     * @var non-empty-string
     */
    protected const ERROR_ENTRY_NOT_FOUND = 'Entry [%s] was not registered';

    /**
     * @var non-empty-string
     */
    protected const ERROR_ENTRY_INIT = 'An error occurred while [%s] entry initialization';

    /**
     * @var array<non-empty-string, \Closure(): T>
     */
    private array $entries = [];

    /**
     * @var array<non-empty-string, T>
     */
    private array $booted = [];

    /**
     * @var non-empty-string|null
     */
    private string|null $default;

    /**
     * @param non-empty-string|null $default
     * @param iterable<non-empty-string, callable(): T> $entries
     */
    public function __construct(string $default = null, iterable $entries = [])
    {
        $this->default = $default;

        foreach ($entries as $entry => $registrar) {
            $this->add($entry, $registrar);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): \Traversable
    {
        foreach ($this->entries as $entry => $_) {
            yield $this->get($entry);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return \count($this->entries);
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $name = null): mixed
    {
        if ($this->entries === []) {
            throw new EmptyManagerException(static::ERROR_EMPTY_MANAGER);
        }

        /** @var string $name */
        $name ??= $this->default ?? \array_key_first($this->entries);

        // Initialize entry if not initialized
        if (!isset($this->booted[$name])) {
            // Lookup entry by name
            $initializer = $this->entries[$name] ?? throw new EntryNotFoundException(
                \sprintf(static::ERROR_ENTRY_NOT_FOUND, $name)
            );

            try {
                // Initialize entry
                $this->booted[$name] = $initializer();
            } catch (\Throwable $e) {
                $message = \sprintf(static::ERROR_ENTRY_INIT, $name);
                throw new InitializationException($message, (int)$e->getCode(), $e);
            }
        }

        return $this->booted[$name];
    }

    /**
     * @param non-empty-string $name
     * @param T|\Closure(): T $entry
     * @return $this
     */
    protected function addEntry(string $name, mixed $entry): self
    {
        if (isset($this->booted[$name])) {
            unset($this->booted[$name]);
        }

        $this->default ??= $name;

        if ($entry instanceof \Closure) {
            $this->entries[$name] = $entry(...);
        } else {
            $this->entries[$name] = static fn() => $entry;
            $this->booted[$name] = $entry;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function free(): void
    {
        $this->booted = [];
    }
}
