<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Pool;

use Helix\Pool\Internal\OnDestructor;

/**
 * @template TReference of object
 * @template TEntry of object
 *
 * @template-implements PoolInterface<TReference, TEntry>
 */
class Pool implements PoolInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_SIZE_OVERFLOW = 'Can not create entry: ' .
        'The maximum allowed number of free entries is used';

    /**
     * @var \WeakMap<TReference, OnDestructor<TEntry>>
     */
    protected \WeakMap $active;

    /**
     * @var array<TEntry>
     */
    protected array $free = [];

    /**
     * @param InstantiatorInterface<TEntry> $instantiator
     * @param positive-int|0 $max
     *
     * @psalm-suppress InvalidPropertyAssignmentValue
     * @psalm-suppress PropertyTypeCoercion
     */
    public function __construct(
        protected readonly InstantiatorInterface $instantiator,
        protected readonly int $max = 0,
    ) {
        $this->active = new \WeakMap();
    }

    /**
     * @return bool
     */
    private function entryCanBeCreated(): bool
    {
        return $this->max > 0 && \count($this) < $this->max;
    }

    /**
     * @return TEntry
     */
    private function getFreeEntry(): object
    {
        if ($this->free === []) {
            if (!$this->entryCanBeCreated()) {
                throw new \OutOfRangeException(\sprintf(self::ERROR_SIZE_OVERFLOW));
            }

            $this->free[] = $this->instantiator->create(null);
        }

        return \array_shift($this->free);
    }

    /**
     * @param TEntry $entry
     * @return void
     */
    private function onEntryRelease(object $entry): void
    {
        $this->free[] = $this->instantiator->create($entry);
    }

    /**
     * @param TReference $reference
     * @return TEntry
     */
    private function createNewEntry(object $reference): object
    {
        $this->active[$reference] = $observer = OnDestructor::create(
            $this->getFreeEntry(),
            $this->onEntryRelease(...)
        );

        return $observer->getEntry();
    }

    /**
     * @param TReference $reference
     * @return TEntry|null
     */
    private function getExistingEntry(object $reference): ?object
    {
        if (isset($this->active[$reference])) {
            return $this->active[$reference]->getReference();
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function has(object $reference): bool
    {
        return isset($this->active[$reference]);
    }

    /**
     * {@inheritDoc}
     */
    public function get(object $reference): object
    {
        if (isset($this->active[$reference])) {
            return $this->active[$reference]->getReference();
        }

        return $this->createNewEntry($reference);
    }

    /**
     * {@inheritDoc}
     */
    public function count(Status $status = null): int
    {
        return match ($status) {
            Status::FREE => \count($this->free),
            Status::ACTIVE => $this->active->count(),
            default => \count($this->free) + $this->active->count(),
        };
    }

    /**
     * @param Status|null $status
     * @return \Traversable<TReference|null, TEntry>
     */
    public function getIterator(Status $status = null): \Traversable
    {
        if ($status !== Status::FREE) {
            foreach ($this->active as $object => $ref) {
                yield $object => $ref->getReference();
            }
        }

        if ($status !== Status::ACTIVE) {
            foreach ($this->free as $connection) {
                yield null => $connection;
            }
        }
    }
}
