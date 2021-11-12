<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

/**
 * @package http
 * @psalm-type LikePsr17Factory = (RequestFactoryInterface
 *                              & ServerRequestFactoryInterface
 *                              & ResponseFactoryInterface
 *                              & StreamFactoryInterface
 *                              & UploadedFileFactoryInterface
 *                              & UriFactoryInterface)
 */
final class Psr17Factory implements Psr17FactoryInterface
{
    /**
     * @param RequestFactoryInterface $requests
     * @param ServerRequestFactoryInterface $serverRequests
     * @param ResponseFactoryInterface $responses
     * @param StreamFactoryInterface $streams
     * @param UploadedFileFactoryInterface $files
     * @param UriFactoryInterface $uris
     */
    public function __construct(
        private RequestFactoryInterface $requests,
        private ServerRequestFactoryInterface $serverRequests,
        private ResponseFactoryInterface $responses,
        private StreamFactoryInterface $streams,
        private UploadedFileFactoryInterface $files,
        private UriFactoryInterface $uris
    ) {}

    /**
     * @param LikePsr17Factory $factory
     */
    public static function fromFactory(mixed $factory): self
    {
        return new self(
            requests: $factory,
            serverRequests: $factory,
            responses: $factory,
            streams: $factory,
            files: $factory,
            uris: $factory,
        );
    }

    /**
     * {@inheritDoc}
     */
    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        return $this->responses->createResponse($code, $reasonPhrase);
    }

    /**
     * {@inheritDoc}
     */
    public function createRequest(string $method, $uri): RequestInterface
    {
        return $this->requests->createRequest($method, $uri);
    }

    /**
     * {@inheritDoc}
     */
    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface
    {
        return $this->serverRequests->createServerRequest($method, $uri, $serverParams);
    }

    /**
     * {@inheritDoc}
     */
    public function createStream(string $content = ''): StreamInterface
    {
        return $this->streams->createStream($content);
    }

    /**
     * {@inheritDoc}
     */
    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        return $this->streams->createStreamFromFile($filename, $mode);
    }

    /**
     * {@inheritDoc}
     */
    public function createStreamFromResource($resource): StreamInterface
    {
        return $this->streams->createStreamFromResource($resource);
    }

    /**
     * {@inheritDoc}
     */
    public function createUploadedFile(
        StreamInterface $stream,
        int $size = null,
        int $error = \UPLOAD_ERR_OK,
        string $clientFilename = null,
        string $clientMediaType = null
    ): UploadedFileInterface {
        return $this->files->createUploadedFile($stream, $size, $error, $clientFilename, $clientMediaType);
    }

    /**
     * {@inheritDoc}
     */
    public function createUri(string $uri = ''): UriInterface
    {
        return $this->uris->createUri($uri);
    }
}
