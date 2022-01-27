<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Extension;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Helix\Boot\Attribute\Singleton;
use Helix\Foundation\Path;

final class DatabaseExtension
{
    #[Singleton(as: [EntityManager::class])]
    public function loadDoctrine(Path $path): EntityManagerInterface
    {
        $config = Setup::createAttributeMetadataConfiguration([
            $path->app('Entity')
        ], false);

        $params = require $path->config('database.php');

        return EntityManager::create($params, $config);
    }
}
