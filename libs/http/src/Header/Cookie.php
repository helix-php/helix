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

class Cookie implements HeaderValueInterface
{
    /**
     * @param non-empty-string $name
     * @param non-empty-string|\Stringable $value
     * @param \DateTimeInterface|null $expires
     * @param positive-int|null $maxAge
     * @param non-empty-string|UriInterface|null $domain
     * @param string|UriInterface|null $path
     * @param SameSite|null $sameSite
     * @param bool $secure
     * @param bool $httpOnly
     * @param bool $partitioned Experimental feature {@link https://developer.chrome.com/docs/privacy-sandbox/chips/}
     * @param bool $sameParty Experimental feature {@link https://developer.chrome.com/blog/first-party-sets-sameparty/}
     * @param array<non-empty-string|int, non-empty-string|int|null> $attributes Additional attributes
     */
    public function __construct(
        private readonly string $name,
        private readonly string|\Stringable $value,
        private readonly ?\DateTimeInterface $expires = null,
        private readonly ?int $maxAge = null,
        private readonly string|UriInterface|null $domain = null,
        private readonly string|UriInterface|null $path = null,
        private readonly ?SameSite $sameSite = null,
        private readonly bool $secure = false,
        private readonly bool $httpOnly = false,
        private readonly bool $partitioned = false,
        private readonly bool $sameParty = false,
        private readonly array $attributes = [],
    ) {
    }

    /**
     * @param array $items
     * @return string
     */
    private function toString(array $items): string
    {
        $result = [];

        foreach ($items as $key => $value) {
            if ($value === null) {
                continue;
            }

            $result[] = \is_int($key) ? $value : "$key=$value";
        }

        return \implode(';', $result);
    }

    /**
     * @return non-empty-string
     */
    public function __toString(): string
    {
        $result = [
            $this->name => $this->value,
            'Expires' => $this->expires?->format(\DateTimeInterface::COOKIE),
            'Max-Age' => $this->maxAge,
            'Domain' => $this->domain instanceof UriInterface
                ? $this->domain->getHost()
                : $this->domain,
            'Path' => $this->path instanceof UriInterface
                ? $this->path->getPath()
                : $this->path,
            'SameSite' => $this->sameSite?->value,
            ($this->secure ? 'Secure' : null),
            ($this->httpOnly ? 'HttpOnly' : null),
            ($this->partitioned ? 'Partitioned' : null),
            ($this->sameParty ? 'SameParty' : null),
        ];

        return $this->toString([...$result, ...$this->attributes]);
    }
}
