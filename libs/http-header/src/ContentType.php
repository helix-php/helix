<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Header;

use Helix\Contracts\Http\Header\Attribute\FlagInterface;
use Helix\Contracts\Http\Header\ProvidesAttributesInterface;
use Helix\Contracts\Http\Header\RequestValueInterface;
use Helix\Contracts\Http\Header\ResponseValueInterface;
use Helix\Http\Header\Attribute\Attribute;
use Helix\Http\Header\Attribute\Flag;

class ContentType extends Value implements
    ProvidesAttributesInterface,
    RequestValueInterface,
    ResponseValueInterface
{
    use AttributesTrait;

    /**
     * @var non-empty-string
     */
    private const ERROR_EMPTY_ATTRIBUTE = 'The "%s" attribute of the '
        . 'Content-Type header cannot be empty';

    /**
     * @var non-empty-string
     */
    public const DEFAULT_MIME_TYPE = 'application/octet-stream';

    /**
     * The MIME type of the resource or the data.
     *
     * @link https://datatracker.ietf.org/doc/html/rfc6838
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types
     *
     * @var non-empty-string
     * @psalm-suppress PropertyNotSetInConstructor
     */
    private string $mimeType;

    /**
     * The character encoding standard.
     *
     * If this value contains {@see null}, then this attribute will not be
     * added into serialized string.
     *
     * @var non-empty-string|null
     */
    private ?string $charset = null;

    /**
     * For multipart entities the "boundary" directive is required. The
     * directive consists of 1 to 70 characters from a set of characters
     * (and not ending with white space) known to be very robust through
     * email gateways. It is used to encapsulate the boundaries of the
     * multiple parts of the message. Often, the header boundary is prepended
     * with two dashes and the final boundary has two dashes appended at the end.
     *
     * If this value contains {@see null}, then this attribute will not be
     * added into serialized string.
     *
     * @var non-empty-string|null
     */
    private ?string $boundary = null;

    /**
     * @param non-empty-string $mimeType
     * @param non-empty-string|null $charset
     * @param non-empty-string|null $boundary
     * @param iterable<FlagInterface> $attributes
     */
    public function __construct(
        string $mimeType,
        ?string $charset = null,
        ?string $boundary = null,
        iterable $attributes = [],
    ) {
        $this->setMimeType($mimeType);
        $this->setCharset($charset);
        $this->setBoundary($boundary);
        $this->setAttributes($attributes);
    }

    /**
     * @param string $value
     * @param non-empty-string $defaultMimeType
     * @return self
     */
    public static function parse(
        string $value,
        string $defaultMimeType = self::DEFAULT_MIME_TYPE,
    ): RequestValueInterface {
        assert($defaultMimeType !== '');

        $attributes = Attributes::parse($value);

        return new self(
            mimeType: (string)($attributes->fetch() ?: $defaultMimeType),
            charset: $attributes->fetchAttribute('charset')?->getValue() ?: null,
            boundary: $attributes->fetchAttribute('boundary')?->getValue() ?: null,
            attributes: $attributes->toArray(),
        );
    }

    /**
     * @return bool
     */
    public function isHtml(): bool
    {
        return \in_array($this->mimeType, ['text/html', 'application/xhtml+xml'], true);
    }

    /**
     * @return bool
     */
    public function isText(): bool
    {
        return \in_array($this->mimeType, ['text/plain'], true);
    }

    /**
     * @return bool
     */
    public function isJs(): bool
    {
        return \in_array($this->mimeType, [
            'application/javascript',
            'application/x-javascript',
            'text/javascript',
        ], true);
    }

    /**
     * @return bool
     */
    public function isCss(): bool
    {
        return \in_array($this->mimeType, ['text/css'], true);
    }

    /**
     * @return bool
     */
    public function isJson(): bool
    {
        return \in_array($this->mimeType, ['application/json', 'application/x-json'], true)
            || \str_ends_with($this->mimeType, '+json');
    }

    /**
     * @return bool
     */
    public function isXml(): bool
    {
        return \in_array($this->mimeType, [
            'text/xml',
            'application/xml',
            'application/x-xml',
        ], true);
    }

    /**
     * @return bool
     */
    public function isFormData(): bool
    {
        return \in_array($this->mimeType, [
            'application/x-www-form-urlencoded',
            'multipart/form-data',
        ], true);
    }

    /**
     * See {@see ContentType::$mimeType} for more information.
     *
     * @return non-empty-string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * Updates the mime-type in the {@see ContentType} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see ContentType::withMimeType()} method.
     *
     * @param non-empty-string $mimeType
     * @return void
     */
    public function setMimeType(string $mimeType): void
    {
        /** @psalm-suppress TypeDoesNotContainType: Type validation */
        if ($mimeType === '') {
            throw new \InvalidArgumentException(\sprintf(self::ERROR_EMPTY_ATTRIBUTE, 'mime-type'));
        }

        $this->mimeType = $mimeType;
    }

    /**
     * Immutable equivalent of the {@see ContentType::setMimeType()} method.
     *
     * @psalm-immutable
     * @param non-empty-string $mimeType
     * @return $this
     */
    public function withMimeType(string $mimeType): self
    {
        $self = clone $this;
        $self->setMimeType($mimeType);

        return $self;
    }

    /**
     * See {@see ContentType::$charset} for more information.
     *
     * @return non-empty-string|null
     */
    public function getCharset(): ?string
    {
        return $this->charset;
    }

    /**
     * Updates the charset attribute in the {@see ContentType} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see ContentType::withCharset()} method.
     *
     * @param non-empty-string|null $charset
     * @return void
     */
    public function setCharset(?string $charset): void
    {
        /** @psalm-suppress TypeDoesNotContainType: Type validation */
        if ($charset === '') {
            throw new \InvalidArgumentException(\sprintf(self::ERROR_EMPTY_ATTRIBUTE, 'charset'));
        }

        $this->charset = $charset;
    }

    /**
     * Immutable equivalent of the {@see ContentType::setCharset()} method.
     *
     * @psalm-immutable
     * @param non-empty-string|null $charset
     * @return $this
     */
    public function withCharset(?string $charset): self
    {
        $self = clone $this;
        $self->setCharset($charset);

        return $self;
    }

    /**
     * See {@see ContentType::$boundary} for more information.
     *
     * @return non-empty-string|null
     */
    public function getBoundary(): ?string
    {
        return $this->boundary;
    }

    /**
     * Updates the boundary attribute in the {@see ContentType} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see ContentType::withBoundary()} method.
     *
     * @param non-empty-string|null $boundary
     * @return void
     */
    public function setBoundary(?string $boundary): void
    {
        /** @psalm-suppress TypeDoesNotContainType: Type validation */
        if ($boundary === '') {
            throw new \InvalidArgumentException(\sprintf(self::ERROR_EMPTY_ATTRIBUTE, 'boundary'));
        }

        if (\is_string($boundary) && \strlen($boundary) > 70) {
            throw new \InvalidArgumentException(
                'The "boundary" attribute length of the '
                . 'Content-Type header must be less than 70'
            );
        }

        $this->boundary = $boundary;
    }

    /**
     * Immutable equivalent of the {@see ContentType::setBoundary()} method.
     *
     * @psalm-immutable
     * @param non-empty-string|null $boundary
     * @return $this
     */
    public function withBoundary(?string $boundary): self
    {
        $self = clone $this;
        $self->setBoundary($boundary);

        return $self;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return Attributes::build([
            new Flag($this->mimeType),
            Attribute::createOrNull('charset', $this->charset),
            Attribute::createOrNull('boundary', $this->boundary),
            ...$this->attributes,
        ]);
    }
}
