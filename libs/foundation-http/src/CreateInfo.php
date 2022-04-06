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
     * @param string<RequestHandlerInterface> $handler
     * @param class-string<HttpErrorHandlerInterface> $errors
     * @param ContainerInterface|null $container
     * @param string|Path $path
     * @param array<ExtensionInterface|class-string<ExtensionInterface>> $extensions
     */
    public function __construct(
        ?bool $debug = null,
        public string $handler = Kernel::class,
        public string $errors = ErrorHandler::class,
        Path|string $path = new Path(),
        public array $extensions = [],
        ContainerInterface $container = null,
    ) {
        parent::__construct($debug, $path, $extensions, $container);
    }
}
