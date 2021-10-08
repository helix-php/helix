<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Async;

/**
 * @psalm-type TaskType = \Generator | \Fiber | \Closure | mixed
 */
final class Task
{
    /**
     * Constructor not available
     */
    private function __construct() {}

    /**
     * @param \Generator $coroutine
     * @return \Fiber
     */
    public static function toFiber(\Generator $coroutine): \Fiber
    {
        return new \Fiber(static function () use ($coroutine): mixed {
            while ($coroutine->valid()) {
                $coroutine->send(
                    \Fiber::suspend($coroutine->current())
                );
            }

            return $coroutine->getReturn();
        });
    }

    /**
     * @param TaskType $task
     * @return \Fiber
     */
    private static function cast(mixed $task): \Fiber
    {
        return match (true) {
            $task instanceof \Generator => self::toFiber($task),
            $task instanceof \Fiber => $task,
            $task instanceof \Closure => new \Fiber($task),
            default => new \Fiber(static fn (): mixed => $task)
        };
    }

    /**
     * @param TaskType $task
     * @return mixed
     * @throws \Throwable
     * @psalm-suppress MixedAssignment
     */
    public static function await(mixed $task): mixed
    {
        $fiber = self::cast($task);
        $value = null;

        if (! $fiber->isStarted()) {
            $value = $fiber->start($value);
        }

        while (! $fiber->isTerminated()) {
            $value = $fiber->resume($value);
        }

        return $fiber->getReturn();
    }

    /**
     * @param \Closure $context
     * @return \Fiber
     */
    public static function async(\Closure $context): \Fiber
    {
        return new \Fiber($context);
    }

    /**
     * @param array<array-key, TaskType> $tasks
     * @return array
     * @throws \Throwable
     * @psalm-suppress MixedAssignment
     */
    public static function cooperative(array $tasks): array
    {
        if ($tasks === []) {
            return [];
        }

        $result = $states = [];

        foreach ($tasks as $id => $task) {
            $tasks[$id] = self::cast($task);
        }

        while ($tasks !== []) {
            /**
             * @var int|string $id
             * @var \Fiber $task
             */
            foreach ($tasks as $id => $task) {
                switch (true) {
                    case $task->isStarted():
                        $states[$id] = $task->start();
                        break;

                    case ! $task->isTerminated():
                        $states[$id] = $task->start($states[$id]);
                        break;

                    default:
                        $result[$id] = $task->getReturn();
                }
            }
        }

        return $result;
    }

    /**
     * @template T of mixed
     * @param T $data
     * @return T
     * @throws \Throwable
     */
    public static function tick(mixed $data = null): mixed
    {
        if (\Fiber::getCurrent() !== null) {
            return \Fiber::suspend($data);
        }

        return $data;
    }
}
