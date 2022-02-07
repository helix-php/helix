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

/**
 * @package foundation
 */
abstract class Application implements LoaderInterface
{
    /**
     * @var Loader
     */
    private Loader $extensions;

    /**
     * @var Container
     */
    protected Container $container;

    /**
     * @var bool
     */
    protected bool $debug;

    /**
     * @param CreateInfo $info
     * @throws RegistrationException
     * @throws NotInstantiatableExceptionInterface
     */
    public function __construct(CreateInfo $info)
    {
        $this->debug = $info->debug;

        $this->container = $info->container;
        $this->container->instance($this);

        $this->bootPath($info);
        $this->bootExtensions($info);
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
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @return string
     */
    protected function getVersion(): string
    {
        return InstalledVersions::getPrettyVersion('helix/foundation') ?? 'dev-master';
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
