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

final class Next implements RequestHandlerInterface
{
    /**
     * @var MiddlewareInterface
     */
    private MiddlewareInterface $middleware;

    /**
     * @var RequestHandlerInterface
     */
    private RequestHandlerInterface $next;

    /**
     * @param MiddlewareInterface $ctx
     * @param RequestHandlerInterface $next
     */
    public function __construct(MiddlewareInterface $ctx, RequestHandlerInterface $next)
    {
        $this->middleware = $ctx;
        $this->next = $next;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws \Throwable
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->middleware->process($request, $this->next);
    }
}
