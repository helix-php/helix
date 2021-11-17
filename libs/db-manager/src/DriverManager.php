<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Manager;

use Helix\Contracts\Database\DriverInterface;
use Helix\Manager\Manager as BaseManager;

/**
 * @psalm-type ConnectionLazyInitializer = \Closure(): DriverInterface
 */
final class DriverManager extends BaseManager implements DriverManagerInterface
{
    /**
     * @param string|null $default
     * @param iterable<DriverInterface> $drivers
     */
    public function __construct(string $default = null, iterable $drivers = [])
    {
        parent::__construct($default, $drivers);
    }

    /**
     * @param string $name
     * @param DriverInterface|ConnectionLazyInitializer $driver
     * @return $this
     */
    public function add(string $name, \Closure|DriverInterface $driver): self
    {
        return $this->addEntry($name, $driver);
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $name = null): DriverInterface
    {
        return parent::get($name);
    }
}
