<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Session\Http;

use Helix\Clock\SystemClock;
use Helix\Http\Header\SetCookie;
use Helix\Http\Header\SetCookie\SameSite;
use Helix\Session\SessionIdInterface;
use Psr\Clock\ClockInterface;

class CookieFactory
{
    /**
     * @param non-empty-string $name
     * @param positive-int $lifetime
     * @param ClockInterface $clock
     */
    public function __construct(
        private string $name,
        private int $lifetime = 7200,
        private readonly ClockInterface $clock = new SystemClock(),
    ) {
    }

    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param non-empty-string $name
     * @return $this
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self->name = $name;

        return $self;
    }

    /**
     * @return positive-int
     */
    public function getLifetime(): int
    {
        return $this->lifetime;
    }

    /**
     * @param positive-int $lifetime
     * @return $this
     */
    public function withLifetime(int $lifetime): self
    {
        $self = clone $this;
        $self->lifetime = $lifetime;

        return $self;
    }

    /**
     * @return \DateTimeInterface
     * @throws \Exception
     */
    private function getExpirationDate(): \DateTimeInterface
    {
        $now = $this->clock->now();

        return $now->add(new \DateInterval('PT' . $this->lifetime . 'S'));
    }

    /**
     * @param SessionIdInterface $session
     * @param bool $secure
     * @return SetCookie
     * @throws \Exception
     */
    public function create(SessionIdInterface $session, bool $secure = false): SetCookie
    {
        return new SetCookie(
            name: $this->name,
            value: $session,
            expires: $this->getExpirationDate(),
            maxAge: $this->lifetime,
            path: '/',
            sameSite: SameSite::LAX,
            secure: $secure,
            httpOnly: true,
        );
    }
}
