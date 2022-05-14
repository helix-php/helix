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
use Helix\EventDispatcher\Exception\ListenerException;
use Helix\EventDispatcher\Exception\ListenerSignatureException;
use Psr\EventDispatcher\ListenerProviderInterface;

/**
 * @template T of EventInterface
 * @template-implements ListenerInterface<T>
 * @template-implements \IteratorAggregate<EventSubscriptionInterface>
 */
final class Listener implements ListenerInterface, ListenerProviderInterface, \IteratorAggregate, \Countable
{
    /**
     * @var array<class-string<EventInterface>, array<EventSubscriptionInterface>>
     */
    private array $subscriptions = [];

    /**
     * @var array<string, class-string<EventInterface>>
     */
    private array $index = [];

    /**
     * @param callable(T, ?EventSubscriptionInterface<T>): void $handler
     * @return class-string<T>
     * @throws ListenerException
     */
    private function getType(callable $handler): string
    {
        try {
            /**
             * @psalm-suppress InvalidArgument
             * @psalm-suppress TooFewArguments
             */
            $reflection = new \ReflectionFunction($handler(...));
        } catch (\ReflectionException $e) {
            throw new ListenerException($e->getMessage(), (int)$e->getCode(), $e);
        }

        $params = $reflection->getParameters();

        if (\count($params) < 1) {
            throw new ListenerSignatureException(
                'Event listener handler must contain at least 1 parameter'
            );
        }

        $type = $params[0]->getType();

        if (!$type instanceof \ReflectionNamedType) {
            throw new ListenerSignatureException(
                'Event listener handler must contain typed event name parameter'
            );
        }

        if ($type->isBuiltin()) {
            throw new ListenerSignatureException(
                'Event listener handler must contain non-builtin typed parameter'
            );
        }

        return $type->getName();
    }

    /**
     * {@inheritDoc}
     * @throws ListenerException
     * @psalm-suppress InvalidReturnStatement
     */
    public function listen(callable|string $handlerOrEventClass, ?callable $handler = null): Subscription
    {
        if ($handler === null) {
            return $this->on($this->getType($handlerOrEventClass), $handlerOrEventClass);
        }

        if (!\is_string($handlerOrEventClass)) {
            throw new \InvalidArgumentException('First argument must be a class string');
        }

        return $this->on($handlerOrEventClass, $handler);
    }

    /**
     * @template TClass of class-string<T>
     * @param TClass $event
     * @param callable(T, ?EventSubscriptionInterface<T>): void $handler
     * @return Subscription
     */
    public function on(string $event, callable $handler): Subscription
    {
        $subscription = new Subscription($this, $handler);

        $this->subscriptions[$event][] = $subscription;
        $this->index[$subscription->getId()] = $event;

        return $subscription;
    }

    /**
     * @template TClass of class-string<T>
     * @param TClass $event
     * @param callable(T, ?EventSubscriptionInterface<T>): void $handler
     * @return Subscription
     * @psalm-suppress InvalidArgument
     * @psalm-suppress MixedArgumentTypeCoercion
     */
    public function once(string $event, callable $handler): Subscription
    {
        $decorator = static function (EventInterface $e, EventSubscriptionInterface $ctx) use ($handler): void {
            $handler($e, $ctx);

            $ctx->cancel();
        };

        return $this->on($event, $decorator);
    }

    /**
     * {@inheritDoc}
     */
    public function cancel(EventSubscriptionInterface|\Stringable|string $subscription): void
    {
        $id = (string)$subscription;

        if (!isset($this->index[$id])) {
            return;
        }

        $group = $this->index[$id];

        foreach ($this->subscriptions[$group] as $i => $subscription) {
            if ($subscription->getId() === $id) {
                unset($this->subscriptions[$group][$i]);
            }
        }

        unset($this->index[$id]);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): \Traversable
    {
        foreach ($this->subscriptions as $event => $subscriptions) {
            foreach ($subscriptions as $subscription) {
                yield $event => $subscription;
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return \count($this->index);
    }

    /**
     * {@inheritDoc}
     */
    public function getListenersForEvent(object $event): iterable
    {
        return $this->subscriptions[$event::class] ?? [];
    }

    /**
     * @return void
     */
    public function cancelAll(): void
    {
        foreach ($this as $subscription) {
            $subscription->cancel();
        }
    }
}
