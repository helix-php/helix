<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Helix\Bridge\Doctrine\Exception\PoolOverflowException;
use Helix\Bridge\Doctrine\Exception\UnknownManagerException;
use Helix\Pool\MasterPoolInterface;

/**
 * @template TReference of object
 * @template-implements EntityManagerFactoryInterface<TReference>
 */
final class EntityMangerFactory implements EntityManagerFactoryInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_POOL_OVERFLOW = 'The maximum allowed number of free connections is used';

    /**
     * @var non-empty-string
     */
    private const ERROR_INVALID_EM = 'Requested unknown entity manager: "%s", known managers: %s';

    /**
     * @var array<string, MasterPoolInterface>
     */
    private array $pools = [];

    /**
     * @param non-empty-string $default
     */
    public function __construct(
        private readonly string $default,
    ) {
    }

    /**
     * @param string $name
     * @param MasterPoolInterface $pool
     * @return void
     */
    public function add(string $name, MasterPoolInterface $pool): void
    {
        $this->pools[$name] = $pool;
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultManager(?object $reference = null): EntityManagerInterface
    {
        return $this->getManager($this->default, $reference);
    }

    /**
     * {@inheritDoc}
     */
    public function getManager(string $name, ?object $reference = null): EntityManagerInterface
    {
        if (!isset($this->pools[$name])) {
            throw new UnknownManagerException(
                \sprintf(self::ERROR_INVALID_EM, $name, \array_keys($this->pools))
            );
        }

        try {
            return $this->pools[$name]->get($reference);
        } catch (\OverflowException $e) {
            throw new PoolOverflowException(self::ERROR_POOL_OVERFLOW, 0, $e);
        }
    }
}
