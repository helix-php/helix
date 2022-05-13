<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\Connection\Pool;

/**
 * @template TReference of object
 * @template TConnection of object
 *
 * @template-implements PoolManagerInterface<TReference, TConnection>
 */
class Manager implements PoolManagerInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_NOT_FOUND = 'Connection pool "%s" has not been configured';

    /**
     * @param array<string, PoolInterface<TReference, TConnection>> $pools
     */
    public function __construct(
        private array $pools = [],
    ) {
    }

    /**
     * @param string $name
     * @param PoolInterface<TReference, TConnection> $pool
     * @return void
     */
    public function add(string $name, PoolInterface $pool): void
    {
        $this->pools[$name] = $pool;
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $name): PoolInterface
    {
        return $this->pools[$name] ?? throw new \InvalidArgumentException(
            \sprintf(self::ERROR_NOT_FOUND, $name)
        );
    }
}
