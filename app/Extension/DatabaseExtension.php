<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Extension;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\Command\ClearCache\CollectionRegionCommand;
use Doctrine\ORM\Tools\Console\Command\ClearCache\EntityRegionCommand;
use Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand;
use Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand;
use Doctrine\ORM\Tools\Console\Command\ClearCache\QueryRegionCommand;
use Doctrine\ORM\Tools\Console\Command\ClearCache\ResultCommand;
use Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand;
use Doctrine\ORM\Tools\Console\Command\InfoCommand;
use Doctrine\ORM\Tools\Console\Command\MappingDescribeCommand;
use Doctrine\ORM\Tools\Console\Command\RunDqlCommand;
use Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand;
use Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand;
use Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand;
use Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand;
use Doctrine\ORM\Tools\Console\EntityManagerProvider;
use Doctrine\ORM\Tools\Setup;
use Helix\Boot\Attribute\Registration;
use Helix\Boot\Attribute\Singleton;
use Helix\Container\Container;
use Helix\Foundation\Console\Application as CliApplication;
use Helix\Foundation\Path;
use Psr\Cache\CacheItemPoolInterface;

final class DatabaseExtension
{
    #[Registration]
    public function loadRepositoryInterfaces(Path $path, Container $app): void
    {
        $config = require $path->config('database.php');

        foreach ($config['repositories'] as $alias => $entity) {
            $app->singleton($alias, static function (EntityManagerInterface $em) use ($entity) {
                return $em->getRepository($entity);
            });
        }
    }

    #[Singleton(as: [EntityManager::class])]
    public function getEntityManager(Path $path, CacheItemPoolInterface $cache = null): EntityManagerInterface
    {
        $config = require $path->config('database.php');

        if ($cache !== null) {
            $cache = DoctrineProvider::wrap($cache);
        }

        $doctrine = Setup::createAttributeMetadataConfiguration(
            $config['entities'] ?? [],
            $config['debug'] ?? false,
            $config['proxies'] ?? null,
            $cache,
        );

        return EntityManager::create($config['connection'], $doctrine);
    }

    #[Singleton]
    public function getEntityManagerProvider(EntityManagerInterface $em): EntityManagerProvider
    {
        return new EntityManagerProvider\SingleManagerProvider($em);
    }

    #[Registration(ifServiceExists: CliApplication::class)]
    public function addConsoleCommands(CliApplication $cli, EntityManagerProvider $em): void
    {
        // Clear Cache
        $cli->add(new QueryCommand($em));
        $cli->add(new ResultCommand($em));
        $cli->add(new MetadataCommand($em));
        $cli->add(new QueryRegionCommand($em));
        $cli->add(new EntityRegionCommand($em));
        $cli->add(new CollectionRegionCommand($em));

        // Schema Tool
        $cli->add(new DropCommand($em));
        $cli->add(new CreateCommand($em));
        $cli->add(new UpdateCommand($em));

        // Basic
        $cli->add(new InfoCommand($em));
        $cli->add(new RunDqlCommand($em));
        $cli->add(new ValidateSchemaCommand($em));
        $cli->add(new MappingDescribeCommand($em));
        $cli->add(new GenerateProxiesCommand($em));
    }
}
