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
use Helix\Database\Migrations\Exception\MigrationException;

final class Factory implements MutableFactoryInterface
{
    /**
     * @var \WeakMap<DriverInterface, SchemaInterface>
     */
    private \WeakMap $instances;

    /**
     * @var array<class-string<DriverInterface>, SchemaInterface>
     */
    private array $classes = [];

    /**
     * Factory constructor.
     */
    public function __construct()
    {
        $this->instances = new \WeakMap();
    }

    /**
     * {@inheritDoc}
     */
    public function with(DriverInterface|string $driver, SchemaInterface $grammar): FactoryInterface
    {
        $self = clone $this;
        $self->extend($driver, $grammar);

        return $self;
    }

    /**
     * @param DriverInterface $driver
     * @return SchemaInterface
     * @throws MigrationException
     */
    public function create(DriverInterface $driver): SchemaInterface
    {
        if (isset($this->instances[$driver])) {
            return $this->instances[$driver];
        }

        if (isset($this->classes[$driver::class])) {
            return $this->classes[$driver::class];
        }

        throw new MigrationException('Could not found grammar for driver [' . $driver::class . ']');
    }

    /**
     * {@inheritDoc}
     */
    public function extend(DriverInterface|string $driver, SchemaInterface $grammar): void
    {
        if ($driver instanceof DriverInterface) {
            $this->instances[$driver] = $grammar;

            if (!isset($this->classes[$driver::class])) {
                $this->classes[$driver::class] = $grammar;
            }
        } else {
            $this->classes[$driver] = $grammar;
        }
    }
}
