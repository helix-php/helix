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

/**
 * @package foundation
 */
final class CreateInfo extends BaseCreateInfo
{
    /**
     * @param ContainerInterface|null $container
     * @param string|Path $path
     * @param array<ExtensionInterface|class-string<ExtensionInterface>> $extensions
     */
    public function __construct(
        ContainerInterface $container = null,
        string|Path $path = new Path(),
        array $extensions = [],
    ) {
        parent::__construct($container, $path, $extensions);
    }
}
