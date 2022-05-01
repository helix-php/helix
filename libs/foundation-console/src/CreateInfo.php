<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Console;

use Helix\Boot\ExtensionInterface;
use Helix\Foundation\CreateInfo as BaseCreateInfo;
use Helix\Foundation\Path;
use Psr\Container\ContainerInterface;

final class CreateInfo extends BaseCreateInfo
{
    /**
     * @param bool|null $debug
     * @param non-empty-string $env
     * @param non-empty-string|Path $path
     * @param array<ExtensionInterface|class-string<ExtensionInterface>> $extensions
     * @param ContainerInterface|null $container
     */
    public function __construct(
        ?bool $debug = null,
        string $env = self::DEFAULT_ENVIRONMENT,
        Path|string $path = new Path(),
        public array $extensions = [],
        ContainerInterface $container = null,
    ) {
        parent::__construct($debug, $env, $path, $extensions, $container);
    }
}
