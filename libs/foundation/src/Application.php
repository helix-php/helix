<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation;

use Composer\InstalledVersions;
use Helix\Boot\Loader;
use Helix\Boot\LoaderInterface;
use Helix\Container\Container;
use Helix\Container\Exception\RegistrationException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

abstract class Application implements LoaderInterface
{
    /**
     * @var Container
     */
    public readonly Container $container;

    /**
     * @var bool
     */
    public readonly bool $debug;

    /**
     * @var non-empty-string
     */
    public readonly string $env;

    /**
     * @var non-empty-string
     */
    public readonly string $version;

    /**
     * @var Loader
     */
    private readonly Loader $extensions;

    /**
     * @param CreateInfo $info
     * @throws RegistrationException
     */
    public function __construct(CreateInfo $info)
    {
        $this->env = $info->env;
        $this->debug = $info->debug;
        $this->container = new Container($info->container);
        $this->extensions = new Loader($this->container);
        $this->initVersion();

        $this->bindDefaults($info);
        $this->loadMany($info->extensions);
    }

    /**
     * @param non-empty-string ...$matches
     * @return bool
     */
    public function env(string ...$matches): bool
    {
        return \in_array($this->env, $matches, true);
    }

    /**
     * @param object $extension
     * @throws RegistrationException
     */
    public function load(object $extension): void
    {
        $this->extensions->load($extension);
    }

    /**
     * @return int
     */
    public function run(): int
    {
        $this->extensions->boot();

        return 0;
    }

    /**
     * @param CreateInfo $info
     * @return void
     */
    private function bindDefaults(CreateInfo $info): void
    {
        $this->container->instance($this)
            ->as(self::class);
        $this->container->instance($info->path);

        $this->container->instance(new NullLogger())
            ->as(LoggerInterface::class);
        $this->container->instance($this->extensions)
            ->withInterfaces();
    }

    /**
     * @return void
     */
    private function initVersion(): void
    {
        $this->version = InstalledVersions::getPrettyVersion('helix/foundation')
            ?? 'dev-master';
    }

    /**
     * @param iterable<string|object> $extensions
     * @return void
     * @throws RegistrationException
     */
    private function loadMany(iterable $extensions): void
    {
        foreach ($extensions as $extension) {
            if ($extension) {
                if (\is_string($extension)) {
                    $extension = $this->container->make($extension);
                }

                $this->load($extension);
            }
        }
    }
}
