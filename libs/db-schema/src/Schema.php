<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Schema;

use Helix\Contracts\Database\ConnectionInterface;

abstract class Schema implements SchemaInterface
{
    /**
     * @param ConnectionInterface $db
     */
    public function __construct(
        protected readonly ConnectionInterface $db,
    ) {}
}
