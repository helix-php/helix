<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Method\Internal;

use Helix\Contracts\Http\Method\MethodInterface;
use Helix\Http\Method\Info;
use Helix\Http\Method\Method;

/**
 * @internal Helix\Http\Method\Internal\CustomMethod is an internal library
 *           class, please do not use it in your code.
 * @psalm-internal Helix\Http\Method\Internal
 */
final class CustomMethod implements MethodInterface
{
    /**
     * @internal Please use {@see Method::parse()} factory method instead.
     *
     * @param non-empty-string $name
     * @param bool $safe
     * @param bool $idempotent
     */
    public function __construct(
        private readonly string $name,
        private bool $safe = false,
        private bool $idempotent = false,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function isIdempotent(): bool
    {
        return $this->idempotent;
    }

    /**
     * {@inheritDoc}
     */
    public function isSafe(): bool
    {
        return $this->safe;
    }

    /**
     * @psalm-immutable
     * @param Info $info
     * @return $this
     */
    public function withInfo(Info $info): self
    {
        $self = clone $this;
        $self->safe = $info->safe;
        $self->idempotent = $info->idempotent;

        return $self;
    }
}
