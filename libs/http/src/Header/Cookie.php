<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Header;

use Helix\Http\Header\Cookie\SameSite;
use Psr\Http\Message\UriInterface;

class Cookie extends HeaderValue implements ProvidesAdditionalAttributesInterface
{
    use ProvidesAdditionalAttributesTrait;

    /**
     * List of available cookie name's chars.
     *
     * @var non-empty-string
     */
    private const NAME_AVAILABLE_CHARS = '!#$%&\'*+-.01234567'
                                       . '89ABCDEFGHIJKLMNOPQ'
                                       . 'RSTUVWXYZ^_`abcdefg'
                                       . 'hijklmnopqrstuvwxyz|~';

    /**
     * List of available cookie value's chars.
     *
     * @var non-empty-string
     */
    private const VALUE_AVAILABLE_CHARS = '!#$%&()*+-./012345678'
                                        . '9:<=>?@ABCDEFGHIJKLMN'
                                        . 'OPQRSTUVWXYZ[\]^_`abc'
                                        . 'defghijklmnopqrstuvwx'
                                        . 'yz{|}~';

    /**
     * A cookie name.
     *
     * Name can contain any US-ASCII characters (defined
     * in {@see Cookie::NAME_AVAILABLE_CHARS} except for: The control character,
     * space, or a tab. It also must not contain a separator characters like the
     * following: `( ) < > @ , ; : \ " / [ ] ? = { }`.
     *
     * A cookie definition begins with a name-value pair.
     *
     * @var non-empty-string
     */
    private string $name;

    /**
     * A cookie value.
     *
     * Value can optionally be wrapped in double quotes and include any
     * US-ASCII character excluding a control character, whitespace,
     * double quotes, comma, semicolon, and backslash.
     *
     * @var string|\Stringable
     */
    private string|\Stringable $value;

    /**
     * @param non-empty-string $name
     * @param string|\Stringable $value
     * @param \DateTimeInterface|null $expires
     * @param positive-int|null $maxAge
     * @param non-empty-string|UriInterface|null $domain
     * @param non-empty-string|UriInterface $path
     * @param SameSite|null $sameSite
     * @param bool $secure
     * @param bool $httpOnly
     * @param array<non-empty-string|int, non-empty-string|int|null> $attributes Additional attributes
     */
    public function __construct(
        string $name,
        string|\Stringable $value = '',
        private ?\DateTimeInterface $expires = null,
        private ?int $maxAge = null,
        private string|UriInterface|null $domain = null,
        private string|UriInterface $path = '/',
        private ?SameSite $sameSite = null,
        private bool $secure = false,
        private bool $httpOnly = false,
        array $attributes = [],
    ) {
        $this->setName($name);
        $this->setValue($value);

        $this->attributes = $this->filter($attributes);
    }

    /**
     * See {@see Cookie::$name} for more information.
     *
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param non-empty-string $name
     * @return void
     */
    public function setName(string $name): void
    {
        if ($name === '') {
            throw new \InvalidArgumentException('Cookie name cannot be empty');
        }

        if (($offset = \strspn($name, self::NAME_AVAILABLE_CHARS)) !== \strlen($name)) {
            $message = 'The cookie name "%s" contains invalid character at position %d';
            throw new \InvalidArgumentException(\sprintf($message, $name, $offset + 1));
        }

        $this->name = $name;
    }

    /**
     * Immutable equivalent of the {@see setName()} method.
     *
     * @psalm-immutable
     * @param non-empty-string $name
     * @return $this
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self->setName($name);

        return $self;
    }

    /**
     * @return string|\Stringable
     */
    public function getValue(): string|\Stringable
    {
        return $this->value;
    }

    /**
     * @param string|\Stringable $value
     * @return void
     */
    public function setValue(string|\Stringable $value): void
    {
        // Stringable objects cannot be validated
        if ($value instanceof \Stringable) {
            $this->value = $value;

            return;
        }

        if (($offset = \strspn($value, self::NAME_AVAILABLE_CHARS)) !== \strlen($value)) {
            $message = 'The cookie value "%s" contains invalid character at position %d';
            throw new \InvalidArgumentException(\sprintf($message, $value, $offset + 1));
        }

        $this->value = $value;
    }

    /**
     * Immutable equivalent of the {@see setValue()} method.
     *
     * @psalm-immutable
     * @param non-empty-string|\Stringable $value
     * @return $this
     */
    public function withValue(string|\Stringable $value): self
    {
        $self = clone $this;
        $self->setValue($value);

        return $self;
    }

    /**
     * Returns the maximum lifetime of the cookie as an HTTP-date timestamp.
     * See {@link https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Date}
     * for the required formatting.
     *
     * If unspecified, the cookie becomes a session cookie. A session finishes
     * when the client shuts down, after which the session cookie is removed.
     *
     * > Warning: Many web browsers have a session restore feature that will save
     * > all tabs and restore them the next time the browser is used. Session
     * > cookies will also be restored, as if the browser was never closed.
     *
     * When an Expires date is set, the deadline is relative to the client the
     * cookie is being set on, not the server.
     *
     * Note: If both "Expires" ({@see getExpires()}) and "Max-Age"
     * ({@see getMaxAge()}) are set, "Max-Age" has precedence.
     *
     * @return \DateTimeInterface|null
     */
    public function getExpires(): ?\DateTimeInterface
    {
        return $this->expires;
    }

    /**
     * Returns the number of seconds until the cookie expires. A zero or
     * negative number will expire the cookie immediately.
     *
     * Note: If both "Expires" ({@see getExpires()}) and "Max-Age"
     * ({@see getMaxAge()}) are set, "Max-Age" has precedence.
     *
     * @return positive-int|null
     */
    public function getMaxAge(): ?int
    {
        return $this->maxAge;
    }

    /**
     * Returns the host to which the cookie will be sent.
     *
     * If omitted, this attribute defaults to the host of the current document
     * URL, not including subdomains.
     *
     * Contrary to earlier specifications, leading dots in domain names
     * (.example.com) are ignored.
     *
     * Multiple host/domain values are not allowed, but if a domain is
     * specified, then subdomains are always included.
     *
     * @return non-empty-string|UriInterface|null
     */
    public function getDomain(): string|UriInterface|null
    {
        return $this->domain;
    }

    /**
     * Same as {@see getDomain()}.
     *
     * @return non-empty-string|null
     */
    public function getDomainString(): string|null
    {
        if ($this->domain instanceof UriInterface) {
            return $this->domain->getHost() ?: null;
        }

        return $this->domain;
    }

    /**
     * Returns the path that must exist in the requested URL for the browser
     * to send the Cookie header.
     *
     * The forward slash (`/`) character is interpreted as a directory
     * separator, and subdirectories are matched as well.
     *
     * For example, for `Path=/docs`:
     *  - The request paths `/docs`, `/docs/`, `/docs/Web/,
     *    and `/docs/Web/HTTP` will all match.
     *  - The request paths `/`, `/docsets`, `/fr/docs` will not match.
     *
     * @return non-empty-string|UriInterface
     */
    public function getPath(): string|UriInterface
    {
        return $this->path;
    }

    /**
     * Same as {@see getPath()}.
     *
     * @return non-empty-string
     */
    public function getPathString(): string
    {
        if ($this->path instanceof UriInterface) {
            return $this->path->getPath();
        }

        return $this->path;
    }

    /**
     * Controls whether or not a cookie is sent with cross-origin requests,
     * providing some protection against cross-site request forgery attacks
     * (CSRF).
     *
     * @see SameSite for more information.
     *
     * @return SameSite|null
     */
    public function getSameSite(): ?SameSite
    {
        return $this->sameSite;
    }

    /**
     * Returns that the cookie is sent to the server only when a request is
     * made with the "https" scheme (except on localhost), and therefore, is
     * more resistant to man-in-the-middle
     * ({@link https://developer.mozilla.org/en-US/docs/Glossary/MitM}) attacks.
     *
     * @return bool
     */
    public function isSecure(): bool
    {
        return $this->secure;
    }

    /**
     * Forbids JavaScript from accessing the cookie, for example, through the
     * `document.cookie` property.
     *
     * Note that a cookie that has been created with "HttpOnly" will still be
     * sent with JavaScript-initiated requests, for example, when calling
     * `XMLHttpRequest.send()` or `fetch()`. This mitigates attacks against
     * cross-site scripting (XSS).
     *
     * @return bool
     */
    public function isHttpOnly(): bool
    {
        return $this->httpOnly;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->build([
            $this->getName() => $this->getValue(),
            'Expires' => $this->expires?->format(\DateTimeInterface::COOKIE),
            'Max-Age' => $this->maxAge,
            'Domain' => $this->getDomainString(),
            'Path' => $this->getPathString(),
            'SameSite' => $this->sameSite?->value,
            ($this->secure ? 'Secure' : null),
            ($this->httpOnly ? 'HttpOnly' : null),
            ...$this->attributes,
        ]);
    }
}
