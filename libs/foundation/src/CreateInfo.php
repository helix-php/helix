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

/**
 * @package foundation
 */
abstract class CreateInfo
{
    /**
     * @var Path
     */
    public Path $path;

    /**
     * @var Container
     */
    public Container $container;

    /**
     * @param ContainerInterface|null $container
     * @param Path|string $path
     * @param array<ExtensionInterface|class-string<ExtensionInterface>> $extensions
     */
    public function __construct(
        ContainerInterface $container = null,
        Path|string $path = new Path(),
        public array $extensions = [],
    ) {
        $this->container = new Container($container);

        $this->path = match (true) {
            \is_string($path) => new Path(root: $path),
            $path === null => new Path(),
            default => $path,
        };
    }
}
