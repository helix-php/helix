<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Router;

use Helix\Contracts\Http\Method\MethodInterface;

/**
 * @see MiddlewareInterface
 *
 * @psalm-type MiddlewareCallableDefinition = callable(ServerRequestInterface, RequestHandlerInterface): ResponseInterface
 */
interface RouteInterface
{
    /**
     * @return non-empty-string
     */
    public function getPath(): string;

    /**
     * @return mixed
     */
    public function getHandler(): mixed;

    /**
     * @return MethodInterface
     */
    public function getMethod(): MethodInterface;

    /**
     * @return array<non-empty-string, string>
     */
    public function getParameters(): array;

    /**
     * @return non-empty-string|null
     */
    public function getName(): ?string;

    /**
     * @return iterable
     */
    public function getMiddleware(): iterable;
}
