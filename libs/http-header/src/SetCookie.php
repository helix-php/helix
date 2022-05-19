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
use Helix\Contracts\Http\Header\ResponseValueInterface;
use Helix\Http\Header\Attribute\Attribute;
use Helix\Http\Header\Attribute\Flag;
use Helix\Http\Header\SetCookie\SameSite;
use Psr\Http\Message\UriInterface;

/**
 * @psalm-import-type AttributesList from ProvidesAttributesInterface
 */
class SetCookie extends Value implements
    ResponseValueInterface,
    ProvidesAttributesInterface
{
    use AttributesTrait;

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
     * in {@see SetCookie::NAME_AVAILABLE_CHARS} except for: The control character,
     * space, or a tab. It also must not contain a separator characters like the
     * following: `( ) < > @ , ; : \ " / [ ] ? = { }`.
     *
     * A cookie definition begins with a name-value pair.
     *
     * @var non-empty-string
     * @psalm-suppress PropertyNotSetInConstructor
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
     * @psalm-suppress PropertyNotSetInConstructor
     */
    private string|\Stringable $value;

    /**
     * Indicates the maximum lifetime of the cookie as an HTTP-date timestamp.
     *
     * When {@see SetCookie} object is serialized into a string, the
     * specified {@see \DateTimeInterface} object will be converted to the
     * following string:
     *
     * ```
     * <day-name>, <day> <month> <year> <hour>:<minute>:<second> GMT
     * ```
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Date
     *
     * If unspecified, the cookie becomes a session cookie. A session finishes
     * when the client shuts down, after which the session cookie is removed.
     *
     * > Warning: Many web browsers have a session restore feature that will
     * > save all tabs and restore them the next time the browser is used.
     * > Session cookies will also be restored, as if the browser was never
     * > closed.
     *
     * When an "Expires" date is set, the deadline is relative to the client the
     * cookie is being set on, not the server.
     *
     * > Note: If both "Expires" ({@see SetCookie::$expires}) and "Max-Age"
     * > ({@see SetCookie::$maxAge}) are set, "Max-Age" has precedence.
     *
     * If this value contains {@see null}, then this attribute will not be
     * added into serialized string.
     *
     * @var \DateTimeInterface|null
     */
    private ?\DateTimeInterface $expires = null;

    /**
     * Indicates the number of seconds until the cookie expires. A zero or
     * negative number will expire the cookie immediately.
     *
     * > Note: If both "Expires" ({@see SetCookie::$expires}) and "Max-Age"
     * > ({@see SetCookie::$maxAge}) are set, "Max-Age" has precedence.
     *
     * If this value contains {@see null}, then this attribute will not be
     * added into serialized string.
     *
     * @var int|null
     */
    private ?int $maxAge = null;

    /**
     * Defines the host to which the cookie will be sent.
     *
     * If omitted, this attribute defaults to the host of the current document
     * URL, not including subdomains.
     *
     * Contrary to earlier specifications, leading dots in domain
     * names (".example.com") are ignored.
     *
     * Multiple host/domain values are not allowed, but if a domain is
     * specified, then subdomains are always included.
     *
     * If this value contains {@see null}, then this attribute will not be
     * added into serialized string.
     *
     * @var UriInterface|non-empty-string|null
     */
    private UriInterface|string|null $domain = null;

    /**
     * Indicates the path that must exist in the requested URL for the browser
     * to send the Cookie header.
     *
     * The forward slash ("/") character is interpreted as a directory
     * separator, and subdirectories are matched as well.
     *
     * For example, for "Path=/docs":
     *  - The request paths "/docs", "/docs/", "/docs/Web/", and
     *    "/docs/Web/HTTP" will all match.
     *  - The request paths "/", "/docsets", "/fr/docs" will NOT match.
     *
     * @var UriInterface|non-empty-string
     */
    private UriInterface|string $path = '/';

    /**
     * Controls whether or not a cookie is sent with cross-origin requests,
     * providing some protection against cross-site request forgery
     * attacks (CSRF: {@link https://developer.mozilla.org/en-US/docs/Glossary/CSRF}).
     *
     * All valid values are listed in {@see SameSite} enum.
     *
     * If this value contains {@see null}, then this attribute will not be
     * added into serialized string.
     *
     * @var SameSite|null
     */
    private ?SameSite $sameSite = null;

    /**
     * Indicates that the cookie is sent to the server only when a request is
     * made with the "https" scheme (except on localhost), and therefore, is
     * more resistant to man-in-the-middle
     * ({@link https://developer.mozilla.org/en-US/docs/Glossary/MitM}) attacks.
     *
     * If this value contains {@see false}, then this attribute will not be
     * added into serialized string.
     *
     * > Note: Do not assume that "Secure" prevents all access to sensitive
     * > information in cookies (session keys, login details, etc.). Cookies
     * > with this attribute can still be read/modified either with access to
     * > the client's hard disk or from JavaScript if the HttpOnly cookie
     * > attribute is not set.
     * >
     * > Insecure sites ("http") cannot set cookies with the "Secure"
     * > attribute (since Chrome 52 and Firefox 52). For Firefox, the "https"
     * > requirements are ignored when the Secure attribute is set by
     * > localhost (since Firefox 75).
     *
     * @var bool
     */
    private bool $secure = false;

    /**
     * Forbids JavaScript from accessing the cookie, for example, through
     * the `document.cookie` (#1) property. Note that a cookie that has been created with "HttpOnly" will
     * still be sent with JavaScript-initiated requests, for example, when
     * calling `XMLHttpRequest.send()` (#2) or `fetch()` (#3). This mitigates attacks
     * against cross-site scripting (XSS: #4).
     *
     * - #1 {@link https://developer.mozilla.org/en-US/docs/Web/API/Document/cookie}
     * - #2 {@link https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/send}
     * - #3 {@link https://developer.mozilla.org/en-US/docs/Web/API/fetch}
     * - #4 {@link https://developer.mozilla.org/en-US/docs/Glossary/Cross-site_scripting}
     *
     * If this value contains {@see false}, then this attribute will not be
     * added into serialized string.
     *
     * @var bool
     */
    private bool $httpOnly = false;

    /**
     * @param non-empty-string $name
     * @param string|\Stringable $value
     * @param \DateTimeInterface|null $expires
     * @param int|null $maxAge
     * @param non-empty-string|UriInterface|null $domain
     * @param non-empty-string|UriInterface $path
     * @param SameSite|null $sameSite
     * @param bool $secure
     * @param bool $httpOnly
     * @param iterable<FlagInterface> $attributes Additional Cookie's attributes
     */
    public function __construct(
        string $name,
        string|\Stringable $value = '',
        ?\DateTimeInterface $expires = null,
        ?int $maxAge = null,
        UriInterface|string|null $domain = null,
        UriInterface|string $path = '/',
        ?SameSite $sameSite = null,
        bool $secure = false,
        bool $httpOnly = false,
        iterable $attributes = [],
    ) {
        $this->setName($name);
        $this->setValue($value);
        $this->setExpires($expires);
        $this->setMaxAge($maxAge);
        $this->setDomain($domain);
        $this->setPath($path);
        $this->setSameSite($sameSite);
        $this->setSecure($secure);
        $this->setHttpOnly($httpOnly);
        $this->setAttributes($attributes);
    }

    /**
     * See {@see SetCookie::$name} for more information.
     *
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Updates the name in the {@see SetCookie} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see SetCookie::withName()} method.
     *
     * @param non-empty-string $name
     * @return void
     */
    public function setName(string $name): void
    {
        /** @psalm-suppress TypeDoesNotContainType: Type validation */
        if ($name === '') {
            throw new \InvalidArgumentException('Cookie name cannot be empty');
        }

        if (($offset = \strspn($name, self::NAME_AVAILABLE_CHARS)) !== \strlen($name)) {
            $message = 'The cookie name "%s" contains invalid character (%s) at position %d';
            $message = \sprintf($message, $name, $name[$offset], $offset + 1);

            throw new \InvalidArgumentException($message);
        }

        $this->name = $name;
    }

    /**
     * Immutable equivalent of the {@see SetCookie::setName()} method.
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
     * See {@see SetCookie::$value} for more information.
     *
     * @return string|\Stringable
     */
    public function getValue(): string|\Stringable
    {
        return $this->value;
    }

    /**
     * Updates the value in the {@see SetCookie} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see SetCookie::withValue()} method.
     *
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
            $message = 'The cookie value "%s" contains invalid character (%s) at position %d';
            $message = \sprintf($message, $value, $value[$offset], $offset + 1);

            throw new \InvalidArgumentException($message);
        }

        $this->value = $value;
    }

    /**
     * Immutable equivalent of the {@see SetCookie::setValue()} method.
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
     * See {@see SetCookie::$expires} for more information.
     *
     * @return \DateTimeInterface|null
     */
    public function getExpires(): ?\DateTimeInterface
    {
        return $this->expires;
    }

    /**
     * Updates the "Expires" attribute in the {@see SetCookie} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see SetCookie::withExpires()} method.
     *
     * @param \DateTimeInterface|null $expires
     * @return void
     */
    public function setExpires(?\DateTimeInterface $expires): void
    {
        $this->expires = $expires;
    }

    /**
     * Immutable equivalent of the {@see SetCookie::setExpires()} method.
     *
     * @psalm-immutable
     * @param \DateTimeInterface|null $expires
     * @return $this
     */
    public function withExpires(?\DateTimeInterface $expires): self
    {
        $self = clone $this;
        $self->setExpires($expires);

        return $self;
    }

    /**
     * See {@see SetCookie::$maxAge} for more information.
     *
     * @return int|null
     */
    public function getMaxAge(): ?int
    {
        return $this->maxAge;
    }

    /**
     * Updates the "Max-Age" attribute in the {@see SetCookie} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see SetCookie::withMaxAge()} method.
     *
     * @param int|null $maxAge
     * @return void
     */
    public function setMaxAge(?int $maxAge): void
    {
        $this->maxAge = $maxAge;
    }

    /**
     * Immutable equivalent of the {@see SetCookie::setMaxAge()} method.
     *
     * @psalm-immutable
     * @param int|null $maxAge
     * @return $this
     */
    public function withMaxAge(?int $maxAge): self
    {
        $self = clone $this;
        $self->setMaxAge($maxAge);

        return $self;
    }

    /**
     * See {@see SetCookie::$domain} for more information.
     *
     * @return UriInterface|non-empty-string|null
     */
    public function getDomain(): UriInterface|string|null
    {
        return $this->domain;
    }

    /**
     * Updates the "Domain" attribute in the {@see SetCookie} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see SetCookie::withDomain()} method.
     *
     * @param UriInterface|non-empty-string|null $domain
     * @return void
     */
    public function setDomain(UriInterface|string|null $domain): void
    {
        /** @psalm-suppress TypeDoesNotContainType: Type validation */
        if ($domain === '' || ($domain instanceof UriInterface && $domain->getHost() === '')) {
            throw new \InvalidArgumentException('Cookie domain cannot be empty');
        }

        $this->domain = $domain;
    }

    /**
     * Immutable equivalent of the {@see SetCookie::setDomain()} method.
     *
     * @psalm-immutable
     * @param UriInterface|non-empty-string|null $domain
     * @return $this
     */
    public function withDomain(UriInterface|string|null $domain): self
    {
        $self = clone $this;
        $self->setDomain($domain);

        return $self;
    }

    /**
     * Returns the string value representation of the {@see SetCookie::$domain}
     * field if data is present or {@see null} instead.
     *
     * Same as {@see SetCookie::getDomain()}.
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
     * See {@see SetCookie::$path} for more information.
     *
     * @return non-empty-string|UriInterface
     */
    public function getPath(): string|UriInterface
    {
        return $this->path;
    }

    /**
     * Updates the "Path" attribute in the {@see SetCookie} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see SetCookie::withPath()} method.
     *
     * @param UriInterface|non-empty-string $path
     * @return void
     */
    public function setPath(UriInterface|string $path): void
    {
        /** @psalm-suppress TypeDoesNotContainType: Type validation */
        if ($path === '' || ($path instanceof UriInterface && $path->getPath() === '')) {
            throw new \InvalidArgumentException('Cookie path cannot be empty');
        }

        $this->path = $path;
    }

    /**
     * Immutable equivalent of the {@see SetCookie::setPath()} method.
     *
     * @psalm-immutable
     * @param UriInterface|non-empty-string $path
     * @return $this
     */
    public function withPath(UriInterface|string $path): self
    {
        $self = clone $this;
        $self->setPath($path);

        return $self;
    }

    /**
     * Returns the string value representation of the {@see SetCookie::$path}
     * field if data is present or {@see null} instead.
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
     * See {@see SetCookie::$sameSite} for more information.
     *
     * @return SameSite|null
     *@see SameSite for more information.
     *
     */
    public function getSameSite(): ?SameSite
    {
        return $this->sameSite;
    }

    /**
     * Updates the "SameSite" attribute in the {@see SetCookie} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see SetCookie::withSameSite()} method.
     *
     * @param SameSite|null $sameSite
     * @return void
     */
    public function setSameSite(?SameSite $sameSite): void
    {
        $this->sameSite = $sameSite;
    }

    /**
     * Immutable equivalent of the {@see SetCookie::setSameSite()} method.
     *
     * @psalm-immutable
     * @param SameSite|null $sameSite
     * @return $this
     */
    public function withSameSite(?SameSite $sameSite): self
    {
        $self = clone $this;
        $self->setSameSite($sameSite);

        return $self;
    }

    /**
     * See {@see SetCookie::$secure} for more information.
     *
     * @return bool
     */
    public function isSecure(): bool
    {
        return $this->secure;
    }

    /**
     * Updates the "Secure" attribute in the {@see SetCookie} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see SetCookie::withSecure()} method.
     *
     * @param bool $secure
     * @return void
     */
    public function setSecure(bool $secure): void
    {
        $this->secure = $secure;
    }

    /**
     * Immutable equivalent of the {@see SetCookie::setSecure()} method.
     *
     * @psalm-immutable
     * @param bool $secure
     * @return $this
     */
    public function withSecure(bool $secure): self
    {
        $self = clone $this;
        $self->setSecure($secure);

        return $self;
    }

    /**
     * See {@see SetCookie::$httpOnly} for more information.
     *
     * @return bool
     */
    public function isHttpOnly(): bool
    {
        return $this->httpOnly;
    }

    /**
     * Updates the "HttpOnly" attribute in the {@see SetCookie} object.
     *
     * > Note that this method changes the value of a field on an
     * > existing object. For an immutable implementation, use
     * > the {@see SetCookie::withHttpOnly()} method.
     *
     * @param bool $httpOnly
     * @return void
     */
    public function setHttpOnly(bool $httpOnly): void
    {
        $this->httpOnly = $httpOnly;
    }

    /**
     * Immutable equivalent of the {@see SetCookie::setHttpOnly()} method.
     *
     * @psalm-immutable
     * @param bool $httpOnly
     * @return $this
     */
    public function withHttpOnly(bool $httpOnly): self
    {
        $self = clone $this;
        $self->setHttpOnly($httpOnly);

        return $self;
    }

    /**
     * Returns string representation of the Cookie header value.
     *
     * Session cookies are removed when the client shuts down. Cookies are
     * session cookies if they do not specify the "Expires" or "Max-Age"
     * attribute.
     *
     * ```
     *  echo new Cookie('sessionId', 'afes7a8');
     *  >> "Set-Cookie: sessionId=38afes7a8"
     * ```
     *
     * Permanent cookies are removed at a specific date ("Expires") or after a
     * specific length of time ("Max-Age") and not when the client is closed.
     *
     * ```
     *  echo (new Cookie('id', 'a3fWa'))->withExpires(new \DateTime());
     *  >> "Set-Cookie: id=a3fWa; Expires=Wed, 21 Jun 2042 07:28:00 GMT"
     *
     *  echo (new Cookie('id', 'a3fWa'))->withMaxAge(2592000);
     *  >> "Set-Cookie: id=a3fWa; Max-Age=2592000"
     * ```
     *
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return Attributes::build([
            new Attribute($this->getName(), $this->getValue()),
            Attribute::createOrNull('Expires', $this->expires
                ?->format(\DateTimeInterface::COOKIE)),
            Attribute::createOrNull('Max-Age', $this->maxAge),
            Attribute::createOrNull('Domain', $this->getDomainString()),
            Attribute::createOrNull('Path', $this->getPathString()),
            Attribute::createOrNull('SameSite', $this->sameSite?->value),
            Flag::createIf('Secure', $this->secure),
            Flag::createIf('HttpOnly', $this->httpOnly),
            ...$this->attributes,
        ]);
    }
}
