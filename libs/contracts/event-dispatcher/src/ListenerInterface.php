<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\EventDispatcher;

/**
 * @template T of EventInterface
 * @see EventInterface
 *
 * @psalm-type SubscribableEventListener = callable(T, EventSubscriptionInterface|null):void
 * @psalm-type EventListener = callable(T):void
 */
interface ListenerInterface
{
    /**
     * Listener usage:
     * ```
     * $listener->listen(SomeEvent::class, function() {
     *      echo 'SomeEvent handling!';
     * });
     *
     * // Otherwise
     * $listener->listen(function(SomeEvent $event): void {
     *      echo 'SomeEvent handling!';
     * });
     * ```
     *
     * @param EventListener|SubscribableEventListener|class-string<T> $handlerOrEventClass
     * @param EventListener|SubscribableEventListener|null $handler
     * @return EventSubscriptionInterface
     * @throws \Throwable
     */
    public function listen(callable|string $handlerOrEventClass, ?callable $handler = null): EventSubscriptionInterface;

    /**
     * @param EventSubscriptionInterface<T>|\Stringable|string $subscription
     * @return void
     */
    public function cancel(EventSubscriptionInterface|\Stringable|string $subscription): void;
}
