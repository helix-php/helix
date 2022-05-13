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
use Helix\Bridge\Doctrine\Connection\Pool\PoolManagerInterface;

/**
 * @template TReference of object
 * @template-implements EntityManagerFactoryInterface<TReference>
 */
final class EntityMangerFactory implements EntityManagerFactoryInterface
{
    /**
     * @param non-empty-string $default
     * @param PoolManagerInterface<TReference, EntityManagerInterface> $manager
     */
    public function __construct(
        private readonly string $default,
        private readonly PoolManagerInterface $manager,
    ) {
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
        $pool = $this->manager->get($name);

        return $pool->get($reference);
    }
}
