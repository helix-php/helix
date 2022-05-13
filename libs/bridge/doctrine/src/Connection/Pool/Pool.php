<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\Connection\Pool;

use Helix\Bridge\Doctrine\Connection\InstantiatorInterface;
use Helix\Bridge\Doctrine\Support\WeakObserver;

/**
 * @template TReference of object
 * @template TConnection of object
 *
 * @template-implements PoolInterface<TReference, TConnection>
 */
class Pool implements PoolInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_SIZE_OVERFLOW = 'Can not establish connection: ' .
        'The maximum allowed number of free connections is used';

    /**
     * @var \WeakMap<TReference, WeakObserver<TConnection>>
     */
    private \WeakMap $active;

    /**
     * @var array<TConnection>
     */
    private array $connections = [];

    /**
     * @param InstantiatorInterface<TConnection> $connector
     * @param PoolCreateInfo $info
     *
     * @psalm-suppress InvalidPropertyAssignmentValue
     * @psalm-suppress PropertyTypeCoercion
     */
    public function __construct(
        private readonly InstantiatorInterface $connector,
        private readonly PoolCreateInfo $info = new PoolCreateInfo(),
    ) {
        $this->active = new \WeakMap();
    }

    /**
     * @return bool
     */
    private function connectionCanBeCreated(): bool
    {
        return $this->info->max > 0 && \count($this) < $this->info->max;
    }

    /**
     * @return TConnection
     */
    private function fetchFreeConnection(): object
    {
        if ($this->connections === []) {
            if (!$this->connectionCanBeCreated()) {
                throw new \OutOfRangeException(\sprintf(self::ERROR_SIZE_OVERFLOW));
            }

            $this->connections[] = $this->connector->create(null);
        }

        return \array_shift($this->connections);
    }

    /**
     * @param TConnection $connection
     * @return void
     */
    private function onConnectionRelease(object $connection): void
    {
        $this->connections[] = $this->connector->create($connection);
    }

    /**
     * @param TReference $reference
     * @return TConnection
     */
    private function createNewConnection(object $reference): object
    {
        $this->active[$reference] = $observer = WeakObserver::create(
            $this->fetchFreeConnection(),
            $this->onConnectionRelease(...)
        );

        return $observer->getReference();
    }

    /**
     * @param TReference $reference
     * @return TConnection|null
     */
    private function getExistingConnection(object $reference): ?object
    {
        if (isset($this->active[$reference])) {
            return $this->active[$reference]->getReference();
        }

        return null;
    }

    /**
     * @return object
     */
    private function getReferenceForMasterConnection(): object
    {
        return $this->active;
    }

    /**
     * {@inheritDoc}
     */
    public function get(?object $reference = null, Type $type = Type::DUPLEX): object
    {
        // Use constant reference as connection relation when:
        if (
            // 1) Reference not defined.
            $reference === null
            // 2) If only one connection is required.
            || $this->info->poller === PollerType::SINGLE
            // 3) If a read connection is used in "unique write" mode.
            || ($this->info->poller === PollerType::SINGLE_READ_UNIQUE_WRITE && $type === Type::READ)
        ) {
            $reference = $this->getReferenceForMasterConnection();
        }

        /** @psalm-suppress PossiblyInvalidArgument */
        return $this->getExistingConnection($reference)
            ?? $this->createNewConnection($reference);
    }

    /**
     * {@inheritDoc}
     */
    public function count(Status $status = null): int
    {
        return match ($status) {
            Status::FREE => \count($this->connections),
            Status::USED => $this->active->count(),
            default => \count($this->connections) + $this->active->count(),
        };
    }

    /**
     * @param Status|null $status
     * @return \Traversable<TReference|null, TConnection>
     */
    public function getIterator(Status $status = null): \Traversable
    {
        if ($status !== Status::FREE) {
            foreach ($this->active as $object => $ref) {
                yield $object => $ref->getReference();
            }
        }

        if ($status !== Status::USED) {
            foreach ($this->connections as $connection) {
                yield null => $connection;
            }
        }
    }
}
