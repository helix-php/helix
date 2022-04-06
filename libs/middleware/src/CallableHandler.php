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
use Psr\Http\Server\RequestHandlerInterface;

/**
 * @see ServerRequestInterface
 * @see ResponseInterface
 *
 * @psalm-type CallableHandlerType = callable(ServerRequestInterface): ResponseInterface
 */
final class CallableHandler implements RequestHandlerInterface
{
    /**
     * @var CallableHandlerType
     */
    private $handler;

    /**
     * @param CallableHandlerType $handler
     */
    public function __construct(callable $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return ($this->handler)($request);
    }
}
