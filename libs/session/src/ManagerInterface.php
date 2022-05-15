<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Session;

use Helix\Contracts\Memoizable\MemoizableInterface;

/**
 * @template TReference of object
 */
interface ManagerInterface extends MemoizableInterface
{
    /**
     * @param TReference $reference
     * @return bool
     */
    public function has(object $reference): bool;

    /**
     * @param TReference $reference
     * @return SessionIdInterface
     */
    public function get(object $reference): SessionIdInterface;

    /**
     * @param TReference $reference
     * @return SessionIdInterface
     */
    public function create(object $reference): SessionIdInterface;

    /**
     * @param TReference $reference
     * @param SessionIdInterface $id
     * @return void
     */
    public function set(object $reference, SessionIdInterface $id): void;
}
