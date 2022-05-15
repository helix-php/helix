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
use Doctrine\ORM\Tools\Console\EntityManagerProvider\UnknownManagerException;
use Helix\Pool\MasterPoolInterface;

/**
 * @template TReference of object
 * @template-implements EntityManagerFactoryInterface<TReference>
 */
final class EntityMangerFactory implements EntityManagerFactoryInterface
{
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
            throw UnknownManagerException::unknownManager($name, \array_keys($this->pools));
        }

        return $this->pools[$name]->get($reference);
    }
}
