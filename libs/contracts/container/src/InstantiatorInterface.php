<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Container;

use Helix\Contracts\Container\Exception\NotInstantiatableExceptionInterface;

interface InstantiatorInterface
{
    /**
     * Attempts to create a new instance of an object by its identifier.
     *
     * @template T of object
     *
     * @param string|class-string<T> $id
     * @return T
     * @throws NotInstantiatableExceptionInterface
     */
    public function make(string $id): object;
}
