<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server;

use Helix\Http\Method\Method;
use Helix\Http\Psr17FactoryInterface;
use Psr\Http\Message\UriInterface;

/**
 * @template T of ExternalServerCreateInfo
 * @template-extends Server<T>
 *
 * @property-read ExternalServerCreateInfo $info
 */
abstract class ExternalServer extends Server
{
    /**
     * @param Psr17FactoryInterface $factory
     * @param T $info
     */
    public function __construct(Psr17FactoryInterface $factory, ExternalServerCreateInfo $info)
    {
        parent::__construct($factory, $info);
    }

    /**
     * @param array $server
     * @return string
     */
    protected function normalizeMethod(array $server): string
    {
        return (string)($server['REQUEST_METHOD'] ?? Method::GET->value);
    }

    /**
     * @param array $server
     * @return UriInterface
     * @psalm-suppress MixedAssignment
     */
    protected function normalizeUri(array $server): UriInterface
    {
        $uri = $this->factory->createUri();

        if (isset($server['HTTPS']) && \in_array(\strtolower((string)$server['HTTPS']), ['on', '1'])) {
            $uri = $uri->withScheme('https');
        } elseif ($scheme = $server['HTTP_X_FORWARDED_PROTO'] ?? $server['REQUEST_SCHEME'] ?? '') {
            $uri = $uri->withScheme((string)$scheme);
        }

        if ($host = $server['HTTP_X_FORWARDED_HOST'] ?? $server['HTTP_HOST'] ?? '') {
            $uri = $uri->withHost((string)$host);
        } elseif ($host = $server['SERVER_NAME'] ?? $server['SERVER_ADDR'] ?? '') {
            $uri = $uri->withHost((string)$host);
        }

        if (isset($server['SERVER_PORT'])) {
            $uri = $uri->withPort((int)$server['SERVER_PORT']);
        }

        if ($path = $server['REQUEST_URI'] ?? $server['ORIG_PATH_INFO'] ?? '') {
            $uri = $uri->withPath(explode('?', \preg_replace('/^[^\/:]+:\/\/[^\/]+/', '', (string)$path), 2)[0]);
        }

        if (isset($server['QUERY_STRING'])) {
            $uri = $uri->withQuery((string)$server['QUERY_STRING']);
        }

        return $uri;
    }
}
