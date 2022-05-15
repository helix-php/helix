<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\Connection;

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Helix\Pool\InstantiatorInterface;

/**
 * @template-implements InstantiatorInterface<EntityManagerInterface>
 */
final class EntityManagerInstantiator implements InstantiatorInterface
{
    /**
     * @param array|Connection $connection
     * @param Configuration $config
     * @param EventManager|null $events
     */
    public function __construct(
        private readonly Connection|array $connection,
        private readonly Configuration $config,
        private readonly ?EventManager $events = null
    ) {
    }

    /**
     * {@inheritDoc}
     * @throws ORMException
     */
    public function create(?object $previous): object
    {
        assert($previous === null || $previous instanceof EntityManagerInterface);

        if ($previous !== null) {
            $previous->clear();

            return $previous;
        }

        return EntityManager::create(
            $this->connection,
            $this->config,
            $this->events,
        );
    }
}
