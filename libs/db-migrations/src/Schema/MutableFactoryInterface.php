<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Migrations\Schema;

use Helix\Contracts\Database\DriverInterface;

interface MutableFactoryInterface extends FactoryInterface
{
    /**
     * @param DriverInterface|class-string<DriverInterface> $driver
     * @param SchemaInterface $grammar
     * @return void
     */
    public function extend(DriverInterface|string $driver, SchemaInterface $grammar): void;
}
