<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Helix\Async\Task;

if (!function_exists('coroutine_to_fiber')) {
    /**
     * @param Generator $generator
     * @return Fiber
     */
    function coroutine_to_fiber(\Generator $generator): \Fiber
    {
        return Task::toFiber($generator);
    }
}

if (!function_exists('await')) {
    /**
     * @param mixed $task
     * @return mixed
     * @throws Throwable
     */
    function await(mixed $task): mixed
    {
        return Task::await($task);
    }
}

if (!function_exists('async')) {
    /**
     * @param Closure $context
     * @return \Fiber
     */
    function async(\Closure $context): \Fiber
    {
        return Task::async($context);
    }
}

if (!function_exists('cooperative')) {
    /**
     * @param array $tasks
     * @return array
     * @throws Throwable
     */
    function cooperative(array $tasks): array
    {
        return Task::cooperative($tasks);
    }
}
