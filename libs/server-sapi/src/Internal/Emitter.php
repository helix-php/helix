<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server\Sapi\Internal;

use Helix\Server\Sapi\Emitter\BodyBehaviour;
use Helix\Server\Sapi\Emitter\HeadersBehaviour;
use Helix\Server\Sapi\EmitterCreateInfo;
use Helix\Server\Sapi\Exception\BodyAlreadySentException;
use Helix\Server\Sapi\Exception\HeadersAlreadySentException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

final class Emitter
{
    /**
     * @param EmitterCreateInfo $info
     */
    public function __construct(
        private EmitterCreateInfo $info = new EmitterCreateInfo(),
    ) {
    }

    /**
     * Emits a HTTP response, that including status line, headers and message
     * body, according to the environment.
     *
     * When implementing this method, MAY use `header()` and the output buffer.
     * Also implementations MAY throw exceptions if cannot emit a response,
     * e.g., if headers already sent or output has been emitted previously.
     *
     * @param ResponseInterface $response
     * @return void
     * @throws BodyAlreadySentException
     * @throws HeadersAlreadySentException
     * @throws \Throwable
     */
    public function emit(ResponseInterface $response): void
    {
        $this->emitHeaders($response);

        if ($response->getBody()->isReadable()) {
            $this->emitBody($response);
        }
    }

    /**
     * @return bool
     */
    private function isHeadersSent(): bool
    {
        return \headers_sent();
    }

    /**
     * @return bool
     */
    private function isBodySent(): bool
    {
        return \ob_get_level() > 0 && \ob_get_length() > 0;
    }

    /**
     * Loops through and emits each header as specified
     * to {@see MessageInterface::getHeaders()}.
     *
     * @param ResponseInterface $response
     * @throws HeadersAlreadySentException
     */
    private function emitHeaders(ResponseInterface $response): void
    {
        if ($this->isHeadersSent()) {
            if ($this->info->headers === HeadersBehaviour::ERROR) {
                throw new HeadersAlreadySentException('Headers already sent');
            }

            return;
        }

        foreach ($response->getHeaders() as $name => $values) {
            $name = \str_replace(' ', '-', \ucwords(\strtolower(\str_replace('-', ' ', (string)$name))));
            $notCookie = $name !== 'Set-Cookie';

            foreach ($values as $value) {
                header("$name: $value", $notCookie);
                $notCookie = false;
            }
        }

        $this->emitStatusLine($response);
    }

    /**
     * Emits the response status line.
     *
     * @param ResponseInterface $response
     * @psalm-suppress RedundantCastGivenDocblockType
     */
    private function emitStatusLine(ResponseInterface $response): void
    {
        $statusCode = $response->getStatusCode();
        $reasonPhrase = \trim($response->getReasonPhrase());
        $protocolVersion = \trim($response->getProtocolVersion());

        $status = $statusCode . ($reasonPhrase ? " $reasonPhrase" : '');
        \header("HTTP/$protocolVersion $status", true, $statusCode);
    }

    /**
     * Emits the message body.
     *
     * @param ResponseInterface $response
     * @throws BodyAlreadySentException
     * @throws \Throwable
     * @psalm-suppress MixedArgument
     */
    private function emitBody(ResponseInterface $response): void
    {
        if ($this->isBodySent()) {
            if ($this->info->body === BodyBehaviour::ERROR) {
                throw new BodyAlreadySentException('Output has been emitted previously');
            }

            if ($this->info->body === BodyBehaviour::SKIP) {
                return;
            }
        }

        \flush();
        $body = $response->getBody();
        $range = $this->parseContentRange($response->getHeaderLine('content-range'));

        if (isset($range['unit']) && $range['unit'] === 'bytes') {
            $this->emitBodyRange($body, $range['first'], $range['last']);

            return;
        }

        if ($body->isSeekable()) {
            $body->rewind();
        }

        while (!$body->eof()) {
            echo $body->read($this->info->bufferLength);
            \flush();
        }

        if (\function_exists('\\fastcgi_finish_request')) {
            \fastcgi_finish_request();
        }
    }

    /**
     * Parse Content-Range header.
     *
     * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.16
     * @param string $header
     * @return array|null
     */
    private function parseContentRange(string $header): ?array
    {
        if (preg_match('/(?P<unit>[\w]+)\s+(?P<first>\d+)-(?P<last>\d+)\/(?P<length>\d+|\*)/', $header, $matches)) {
            return [
                'unit'   => $matches['unit'],
                'first'  => (int)$matches['first'],
                'last'   => (int)$matches['last'],
                'length' => ($matches['length'] === '*') ? '*' : (int)$matches['length'],
            ];
        }

        return null;
    }

    /**
     * Emits a range of the message body.
     *
     * @param StreamInterface $body
     * @param positive-int $first
     * @param positive-int $last
     * @psalm-suppress PossiblyNullArgument
     */
    private function emitBodyRange(StreamInterface $body, int $first, int $last): void
    {
        $length = $last - $first + 1;

        if ($body->isSeekable()) {
            $body->seek($first);
        }

        while ($length >= $this->info->bufferLength && !$body->eof()) {
            $contents = $body->read($this->info->bufferLength);
            $length -= \strlen($contents);
            echo $contents;
        }

        if ($length > 0 && !$body->eof()) {
            echo $body->read($length);
        }
    }
}
