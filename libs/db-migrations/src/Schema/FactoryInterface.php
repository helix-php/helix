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

interface FactoryInterface
{
    /**
     * @param DriverInterface|class-string<DriverInterface> $driver
     * @param SchemaInterface $grammar
     * @return $this
     */
    public function with(DriverInterface|string $driver, SchemaInterface $grammar): self;

    /**
     * @param DriverInterface $driver
     * @return SchemaInterface
     */
    public function create(DriverInterface $driver): SchemaInterface;
}
