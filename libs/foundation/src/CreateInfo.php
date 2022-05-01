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
use Psr\Container\ContainerInterface;

class CreateInfo
{
    /**
     * @var non-empty-string
     */
    public const DEFAULT_ENVIRONMENT = 'prod';

    /**
     * @var Path
     */
    public readonly Path $path;

    /**
     * @var bool
     */
    public readonly bool $debug;

    /**
     * @param bool|null $debug
     * @param non-empty-string $env
     * @param Path|non-empty-string $path
     * @param array<ExtensionInterface|class-string<ExtensionInterface>> $extensions
     * @param ContainerInterface|null $container
     */
    public function __construct(
        ?bool $debug = null,
        public readonly string $env = self::DEFAULT_ENVIRONMENT,
        Path|string $path = new Path(),
        public array $extensions = [],
        public readonly ?ContainerInterface $container = null,
    ) {
        $this->debug = $this->bootDebugValue($debug);
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
