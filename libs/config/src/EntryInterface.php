<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config;

use Helix\Contracts\Arrayable\ArrayableInterface;

/**
 * @template TKey of array-key
 *
 * @template-extends \IteratorAggregate<TKey, mixed>
 * @template-extends \ArrayAccess<TKey, mixed>
 */
interface EntryInterface extends ArrayableInterface, \IteratorAggregate, \ArrayAccess
{
    /**
     * @param non-empty-string $key
     * @return mixed
     */
    public function get(string $key): mixed;

    /**
     * @param non-empty-string $key
     * @param mixed|null $default
     * @return mixed
     */
    public function find(string $key, mixed $default = null): mixed;

    /**
     * @param non-empty-string $key
     * @return bool
     */
    public function has(string $key): bool;
}
