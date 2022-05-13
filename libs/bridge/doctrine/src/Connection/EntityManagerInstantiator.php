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

/**
 * @template-extends ClosureInstantiator<EntityManagerInterface>
 */
class EntityManagerInstantiator extends ClosureInstantiator
{
    /**
     * @param array|Connection $connection
     * @param Configuration $config
     * @param EventManager|null $eventManager
     */
    public function __construct(
        Connection|array $connection,
        Configuration $config,
        ?EventManager $eventManager = null
    ) {
        parent::__construct(static function (?EntityManagerInterface $prev) use (
            $connection,
            $config,
            $eventManager,
        ) {
            if ($prev !== null) {
                $prev->clear();

                return $prev;
            }

            /** @psalm-suppress MixedArgumentTypeCoercion */
            return EntityManager::create($connection, $config, $eventManager);
        });
    }
}
