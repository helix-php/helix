<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMSetup;
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
use Helix\Boot\Attribute\Registration;
use Helix\Boot\Attribute\Singleton;
use Helix\Bridge\Doctrine\Connection\EntityManagerInstantiator;
use Helix\Config\ConfigInterface;
use Helix\Config\RegistrarInterface;
use Helix\Foundation\Application;
use Helix\Foundation\Console\Application as CliApplication;
use Helix\Pool\MasterPool;
use Psr\Cache\CacheItemPoolInterface;

final class DoctrineExtension
{
    #[Registration]
    public function loadConfiguration(RegistrarInterface $registrar): void
    {
        $registrar->addFile('doctrine.yml');
    }

    #[Singleton(as: [EntityManagerProvider::class])]
    public function getEntityManagerFactory(
        ConfigInterface $config,
        Application $app,
        CacheItemPoolInterface $cache = null,
    ): EntityManagerFactoryInterface {
        /** @var array{orm?: array<string, array>} */
        $doctrine = $config->get('doctrine');

        $factory = new EntityMangerFactory($doctrine['default'] ?? 'default');

        foreach (($doctrine['orm'] ?? []) as $name => $params) {
            $instantiator = new EntityManagerInstantiator(
                $this->getConnectionConfigArray($config, $params['connection'] ?? 'default'),
                $this->getORMConfig($params, $app, $cache),
            );

            $factory->add($name, new MasterPool($instantiator));
        }

        return $factory;
    }

    private function getORMConfig(array $config, Application $app, ?CacheItemPoolInterface $cache): Configuration
    {
        return ORMSetup::createAttributeMetadataConfiguration(
            paths: (array)($config['paths'] ?? []),
            isDevMode: $app->debug,
            cache: $cache,
        );
    }

    private function getConnectionConfigArray(ConfigInterface $config, string $name): array
    {
        /** @var array{connections?: array<string, array>} */
        $doctrine = $config->get('doctrine');

        if (!isset($doctrine['connections'][$name])) {
            throw new \InvalidArgumentException('Could not find database connection "' . $name . '"');
        }

        return (array)$doctrine['connections'][$name];
    }

    #[Singleton]
    public function getDefaultEntityManager(EntityManagerFactoryInterface $factory): EntityManagerInterface
    {
        return $factory->getDefaultManager();
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
