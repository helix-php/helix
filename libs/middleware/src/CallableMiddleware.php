<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * @see ServerRequestInterface
 * @see ResponseInterface
 *
 * @psalm-type CallableMiddlewareType = callable(ServerRequestInterface, RequestHandlerInterface): ResponseInterface
 */
final class CallableMiddleware implements MiddlewareInterface
{
    /**
     * @var CallableMiddlewareType
     */
    private $handler;

    /**
     * @param CallableMiddlewareType $handler
     */
    public function __construct(callable $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return ($this->handler)($request, $handler);
    }
}
