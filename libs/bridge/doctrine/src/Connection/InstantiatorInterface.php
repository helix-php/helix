<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\Connection;

/**
 * @template TConnection of object
 */
interface InstantiatorInterface
{
    /**
     * @param TConnection|null $previous
     * @return TConnection
     */
    public function create(?object $previous): object;
}
