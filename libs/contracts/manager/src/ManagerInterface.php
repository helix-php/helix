<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Manager;

/**
 * @template T of mixed
 * @template-extends \IteratorAggregate<string, T>
 */
interface ManagerInterface extends \IteratorAggregate, \Countable
{
    /**
     * @param non-empty-string|null $name
     * @return T
     * @throw EntryNotFoundExceptionInterface
     */
    public function get(string $name = null): mixed;
}
