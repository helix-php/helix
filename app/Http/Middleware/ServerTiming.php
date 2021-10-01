<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ServerTiming implements MiddlewareInterface
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(private string $name = 'Controller Execution')
    {
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $before = \microtime(true);

        $response = $handler->handle($request);

        $header = [
            \urlencode($this->name),
            'dur=' . (\microtime(true) - $before),
            'desc="' . \addcslashes($this->name, '"') . '"',
        ];

        $value = \implode(';', [\urlencode($this->name), ...$header]);

        return $response
            ->withAddedHeader('server-timing', $value)
        ;
    }
}
