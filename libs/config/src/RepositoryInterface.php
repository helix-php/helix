<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config;

/**
 * @template-extends \IteratorAggregate<string, mixed>
 */
interface RepositoryInterface extends \IteratorAggregate, \Countable
{
    /**
     * @param non-empty-string $key
     * @return mixed
     */
    public function get(string $key): mixed;

    /**
     * @param non-empty-string $key
     * @return bool
     */
    public function has(string $key): bool;
}
