<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\EventDispatcher;

use Helix\Contracts\EventDispatcher\EventInterface;
use Helix\Contracts\EventDispatcher\EventSubscriptionInterface;
use Helix\Contracts\EventDispatcher\ListenerInterface;
use Ramsey\Uuid\Uuid;

/**
 * @template T of EventInterface
 * @template-implements EventSubscriptionInterface<T>
 * @see EventInterface
 */
final class Subscription implements EventSubscriptionInterface
{
    /**
     * @var \Closure
     */
    private \Closure $handler;

    /**
     * @var string|null
     */
    private ?string $id = null;

    /**
     * @var positive-int|0
     */
    private int $executions = 0;

    /**
     * @param ListenerInterface $listener
     * @param callable $handler
     */
    public function __construct(private ListenerInterface $listener, callable $handler)
    {
        $this->handler = $handler(...);
    }

    /**
     * {@inheritDoc}
     */
    public function getId(): string
    {
        return $this->id ??= (string)Uuid::uuid4();
    }

    /**
     * {@inheritDoc}
     */
    public function dispatch(object $event): void
    {
        ++$this->executions;

        ($this->handler)($event, $this);
    }

    /**
     * {@inheritDoc}
     */
    public function getExecutionsNumber(): int
    {
        return $this->executions;
    }

    /**
     * {@inheritDoc}
     */
    public function cancel(): void
    {
        $this->listener->cancel($this);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->getId();
    }
}
