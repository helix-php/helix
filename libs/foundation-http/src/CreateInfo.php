<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Http;

use Helix\Boot\ExtensionInterface;
use Helix\Contracts\ErrorHandler\Http\HttpErrorHandlerInterface;
use Helix\Foundation\CreateInfo as BaseCreateInfo;
use Helix\Foundation\Path;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class CreateInfo extends BaseCreateInfo
{
    /**
     * @param bool|null $debug
     * @param non-empty-string|null $env
     * @param class-string<RequestHandlerInterface> $handler
     * @param class-string<HttpErrorHandlerInterface> $errors
     * @param non-empty-string|Path $path
     * @param array<ExtensionInterface|class-string<ExtensionInterface>> $extensions
     * @param ContainerInterface|null $container
     */
    public function __construct(
        ?bool $debug = null,
        ?string $env = null,
        public string $handler = Kernel::class,
        public string $errors = ErrorHandler::class,
        Path|string $path = new Path(),
        public array $extensions = [],
        ContainerInterface $container = null,
    ) {
        parent::__construct($debug, $env, $path, $extensions, $container);
    }
}
