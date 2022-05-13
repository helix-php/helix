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
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

/**
 * @template-extends ClosureInstantiator<Connection>
 */
class DriverManagerConnector extends ClosureInstantiator
{
    /**
     * @param array $params
     * @param Configuration|null $config
     * @param EventManager|null $eventManager
     */
    public function __construct(
        array $params,
        ?Configuration $config = null,
        ?EventManager $eventManager = null,
    ) {
        parent::__construct(static function (?Connection $prev) use (
            $params,
            $config,
            $eventManager,
        ): Connection {
            if ($prev !== null && $prev->isTransactionActive()) {
                return $prev;
            }

            /** @psalm-suppress MixedArgumentTypeCoercion */
            return DriverManager::getConnection($params, $config, $eventManager);
        });
    }
}
