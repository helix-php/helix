<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Debug\Middleware;

use Helix\Foundation\Http\Application;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * This middleware is responsible for embedding information about the current
 * request processing time inside the response headers.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Server-Timing
 */
class ServerTiming implements MiddlewareInterface
{
    /**
     * @var float
     */
    private readonly float $boot;

    /**
     * @param Application $app
     */
    public function __construct(
        private readonly Application $app
    ) {
        $this->boot = \microtime(true);
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // If debug disabled
        if ($this->app->debug === false) {
            return $handler->handle($request);
        }

        $boot = ($before = \microtime(true)) - $this->boot;

        $response = $handler->handle($request);

        $after = \microtime(true);

        return $response->withAddedHeader('Server-Timing', \implode(', ', [
            $this->create('env', title: 'env = ' . $this->app->env),
            $this->create('debug', title: 'debug = ' . ($this->app->debug ? 'true' : 'false')),
            $this->create('app', $after - $this->boot, 'application'),
            $this->create('boot', $boot, 'bootstrap'),
            $this->create('controller', $after - $before, 'controller'),
        ]));
    }

    /**
     * @param non-empty-string $id
     * @param float|null $duration
     * @param non-empty-string|null $title
     * @return non-empty-string
     */
    private function create(string $id, ?float $duration = null, ?string $title = null): string
    {
        $result = $id;

        if ($title !== null) {
            $result .= \sprintf(';desc="%s"', $title);
        }

        if ($duration !== null) {
            $result .= \sprintf(';dur=%s', \number_format($duration, 4, thousands_separator: ''));
        }

        return $result;
    }
}
