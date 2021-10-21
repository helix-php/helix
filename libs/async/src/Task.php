<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Async;

abstract class Task
{
    /**
     * @param \Closure $expr
     * @return mixed
     * @throws \Throwable
     */
    public static function run(\Closure $expr): mixed
    {
        $result = self::tick($expr());

        if ($result instanceof \Generator) {
            return self::await($result);
        }

        return $result;
    }

    /**
     * @template T of mixed
     *
     * @param (\Closure(): T|\Generator<mixed, mixed, mixed, T>) $expr
     * @return \Fiber<mixed, mixed, mixed, T>
     */
    public static function async(\Closure|\Generator $task): \Fiber
    {
        if ($task instanceof \Generator) {
            return self::toFiber($task);
        }

        return new \Fiber($task);
    }

    /**
     * @param \Generator $coroutine
     * @return \Fiber
     */
    private static function toFiber(\Generator $coroutine): \Fiber
    {
        return new \Fiber(static function () use ($coroutine) {
            while ($coroutine->valid()) {
                $coroutine->send(\Fiber::suspend($coroutine->current()));
            }

            return $coroutine->getReturn();
        });
    }

    /**
     * @template T of mixed
     *
     * @param \Fiber<mixed, mixed, mixed, T> $fiber
     * @return T
     * @throws \Throwable
     */
    private static function awaitFiber(\Fiber $fiber): mixed
    {
        if (\Fiber::getCurrent()) {
            if (!$fiber->isStarted()) {
                $context = $fiber->start();

                if ($context instanceof \Generator) {
                    return self::await($context);
                }
            }

            while (!$fiber->isTerminated()) {
                \Fiber::suspend($fiber->resume());
            }

            return $fiber->getReturn();
        }

        if (! $fiber->isStarted()) {
            $context = $fiber->start();

            if ($context instanceof \Generator) {
                return self::await($context);
            }
        }

        while (! $fiber->isTerminated()) {
            dump('RES: ', $fiber->resume());
        }

        return $fiber->getReturn();
    }

    /**
     * @template T of mixed
     *
     * @param \Generator<mixed, mixed, mixed, T> $coroutine
     * @return T
     * @throws \Throwable
     */
    private static function awaitCoroutine(\Generator $coroutine): mixed
    {
        if (\Fiber::getCurrent()) {
            while ($coroutine->valid()) {
                $coroutine->send(\Fiber::suspend($coroutine->current()));
            }

            return $coroutine->getReturn();
        }

        while ($coroutine->valid()) {
            $coroutine->send($coroutine->current());
        }

        return $coroutine->getReturn();
    }

    /**
     * @template T of mixed
     *
     * @param \Fiber<mixed, mixed, mixed, T>|\Generator<mixed, mixed, mixed, T> $task
     * @return T
     * @throws \Throwable
     */
    public static function await(\Fiber|\Generator $task): mixed
    {
        if ($task instanceof \Generator) {
            return self::awaitCoroutine($task);
        }

        return self::awaitFiber($task);
    }

    /**
     * @param mixed $value
     * @return mixed
     * @throws \Throwable
     */
    public static function tick(mixed $value): mixed
    {
        if (\Fiber::getCurrent()) {
            return \Fiber::suspend($value);
        }

        return $value;
    }

    /**
     * @template T of mixed
     *
     * @param non-empty-list<\Fiber<mixed, mixed, mixed, T>> $tasks
     * @return non-empty-array<T>
     * @throws \Throwable
     */
    public static function all(iterable $tasks): array
    {
        $result = $from = [];

        foreach ($tasks as $id => $task) {
            $task = match (true) {
                $task instanceof \Fiber => $task,
                $task instanceof \Closure => new \Fiber($task),
                default => new \Fiber(static fn () => $task),
            };

            $result[$id] = null;
            $from[$id] = $task;
        }

        while ($from !== []) {
            /** @var \Fiber $task */
            foreach ($from as $id => $task) {
                switch (false) {
                    case $task->isStarted():
                        self::tick($task->start());
                        break;

                    case $task->isTerminated():
                        self::tick($task->resume());
                        break;

                    default:
                        $result[$id] = $task->getReturn();
                        unset($from[$id]);
                }
            }
        }

        return $result;
    }
}
