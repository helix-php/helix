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
use Helix\Boot\RepositoryInterface;
use Helix\Container\Container;
use Helix\Container\Exception\RegistrationException;
use Helix\Contracts\Container\Exception\NotInstantiatableExceptionInterface;
use Helix\Env\Environment;

abstract class Application implements LoaderInterface
{
    /**
     * @var non-empty-string
     */
    protected const ENV_DEBUG = 'APP_DEBUG';

    /**
     * @var non-empty-string
     */
    protected const ENV_NAME = 'APP_ENV';

    /**
     * @var Loader
     */
    private readonly Loader $extensions;

    /**
     * @var Container
     */
    protected readonly Container $container;

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
     * @param CreateInfo $info
     * @throws RegistrationException
     * @throws NotInstantiatableExceptionInterface
     */
    public function __construct(CreateInfo $info)
    {
        $this->loadEnvironment($info);

        $this->debug = (bool)($info->debug ?? Environment::get(static::ENV_DEBUG, false));
        $this->env = (string)($info->env ?? Environment::get(static::ENV_NAME, 'prod'));

        $this->container = $info->container;
        $this->container->instance($this);

        $this->bootVersion();
        $this->bootPath($info);
        $this->bootExtensions($info);
    }

    /**
     * @param CreateInfo $info
     * @return void
     */
    private function loadEnvironment(CreateInfo $info): void
    {
        if (!Environment::loaded()) {
            Environment::dotenv($info->path->root('.env'));
        }
    }

    /**
     * @return void
     */
    private function bootVersion(): void
    {
        $this->version = InstalledVersions::getPrettyVersion('helix/foundation')
            ?? 'dev-master';
    }

    /**
     * @param CreateInfo $info
     * @return void
     * @throws NotInstantiatableExceptionInterface
     * @throws RegistrationException
     */
    private function bootExtensions(CreateInfo $info): void
    {
        $this->extensions = new Loader($this->container);

        $this->container->instance($this->extensions)
            ->as(RepositoryInterface::class)
        ;

        foreach ($info->extensions as $extension) {
            if (\is_string($extension)) {
                $extension = $this->container->make($extension);
            }

            $this->load($extension);
        }
    }

    /**
     * @param CreateInfo $info
     * @return void
     */
    private function bootPath(CreateInfo $info): void
    {
        $this->container->instance($info->path);
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
}
