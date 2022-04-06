<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation;

use Helix\Boot\ExtensionInterface;
use Helix\Container\Container;
use Psr\Container\ContainerInterface;

abstract class CreateInfo
{
    /**
     * @var bool
     */
    public bool $debug;

    /**
     * @var Path
     */
    public Path $path;

    /**
     * @var Container
     */
    public Container $container;

    /**
     * @param bool|null $debug
     * @param Path|string $path
     * @param array<ExtensionInterface|class-string<ExtensionInterface>> $extensions
     * @param ContainerInterface|null $container
     */
    public function __construct(
        ?bool $debug = null,
        Path|string $path = new Path(),
        public array $extensions = [],
        ContainerInterface $container = null,
    ) {
        $this->debug = $this->bootDebugValue($debug);
        $this->container = $this->bootContainerValue($container);
        $this->path = $this->bootPathValue($path);
    }

    /**
     * @param Path|string $path
     * @return Path
     */
    private function bootPathValue(Path|string $path): Path
    {
        if ($path instanceof Path) {
            return $path;
        }

        return new Path(root: $path);
    }

    /**
     * @param ContainerInterface|null $container
     * @return Container
     */
    private function bootContainerValue(?ContainerInterface $container): Container
    {
        return new Container($container);
    }

    /**
     * @param bool|null $debug
     * @return bool
     */
    private function bootDebugValue(?bool $debug): bool
    {
        $result = $debug ?? false;

        // In case of debug is null then use php "zend.assertions"
        // option to resolve debug environment.
        if ($debug === null) {
            assert($result = true);
        }

        return $result;
    }
}
