<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Schema\SQLite;

use Helix\Database\Schema\Column as BaseColumn;

final class Column extends BaseColumn
{
    public function getType(): string
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }

    public function isNotNull(): bool
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }

    public function exists(): bool
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }
}
