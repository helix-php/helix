<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Session;

use Psr\Clock\ClockInterface;
use Ramsey\Uuid\Uuid;

final class SessionId implements SessionIdInterface
{
    /**
     * @param non-empty-string|\Stringable $id
     */
    public function __construct(
        private readonly string|\Stringable $id,
        private readonly bool $new = false,
    ) {
    }

    /**
     * @param SessionIdInterface $id
     * @return SessionIdInterface
     */
    public static function stored(SessionIdInterface $id): SessionIdInterface
    {
        return new self((string)$id, false);
    }

    /**
     * @param SessionIdInterface $id
     * @return SessionIdInterface
     */
    public static function new(SessionIdInterface $id): SessionIdInterface
    {
        return new self((string)$id, true);
    }

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->new;
    }

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self(Uuid::uuid4(), true);
    }

    /**
     * @param ClockInterface $clock
     * @return static
     */
    public static function createFromClock(ClockInterface $clock): self
    {
        $now = $clock->now();

        return new self(Uuid::uuid6(clockSeq: $now->getTimestamp()), true);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return (string)$this->id;
    }
}
