<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Stream;

use Psr\Http\Message\StreamInterface;

final class EventSourceStream implements StreamInterface
{
    /**
     * @var \Generator
     */
    private \Generator $stream;

    /**
     * @param \Generator $stream
     */
    private function __construct(\Generator $stream)
    {
        $this->stream = $stream;
    }

    /**
     * @param mixed $data
     * @return static
     */
    public static function create(mixed $data): self
    {
        return match (true) {
            $data instanceof \Closure => self::create($data()),
            $data instanceof \Generator => new EventSourceStream($data),
            $data instanceof StreamInterface => $data,
        };
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        throw new \LogicException(__METHOD__ . ' not available');
    }

    /**
     * {@inheritDoc}
     */
    public function close()
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }

    /**
     * {@inheritDoc}
     */
    public function detach()
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }

    /**
     * {@inheritDoc}
     */
    public function getSize(): int
    {
        return -1;
    }

    /**
     * {@inheritDoc}
     */
    public function tell()
    {
        throw new \LogicException(__METHOD__ . ' not available');
    }

    /**
     * {@inheritDoc}
     */
    public function isSeekable(): bool
    {
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function seek($offset, $whence = \SEEK_SET): void
    {
        throw new \LogicException(__METHOD__ . ' not available');
    }

    /**
     * {@inheritDoc}
     */
    public function rewind(): void
    {
        throw new \LogicException(__METHOD__ . ' not available');
    }

    /**
     * {@inheritDoc}
     */
    public function isWritable(): bool
    {
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function write($string)
    {
        throw new \LogicException(__METHOD__ . ' not available');
    }

    /**
     * {@inheritDoc}
     */
    public function isReadable(): bool
    {
        return $this->stream->valid();
    }

    /**
     * {@inheritDoc}
     * @psalm-suppress MixedAssignment
     */
    public function read($length): string
    {
        if ($this->stream->valid()) {
            [$event, $data] = [$this->stream->key(), $this->stream->current()];

            $this->stream->next();

            return \sprintf("event: %s\n", $this->escape($event))
                . \sprintf("data: %s\n\n", $this->escape($data));
        }

        return '';
    }

    /**
     * @param string $data
     * @return string
     */
    private function escape(string $data): string
    {
        return \str_replace("\n", '', $data);
    }

    /**
     * {@inheritDoc}
     */
    public function getContents(): string
    {
        throw new \LogicException(__METHOD__ . ' not available');
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata($key = null)
    {
        $data = [
            "timed_out" => false,
            "blocked" => false,
            "eof" => $this->eof(),
            "unread_bytes" => -1,
            "stream_type" => 'stream',
            "wrapper_type" => 'stream',
            "wrapper_data" => 'stream',
            "mode" => 'rb',
            "seekable" => false,
            "uri" => 'php://memory',
            "crypto" => [],
            "mediatype" => 'text/event-stream'
        ];

        if ($key === null) {
            return $data;
        }

        return $data[$key] ?? null;
    }

    /**
     * {@inheritDoc}
     */
    public function eof(): bool
    {
        return !$this->stream->valid();
    }
}
