<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Method;

use Helix\Contracts\Http\Method\MethodInterface;

/**
 * @internal Helix\Http\Method\CustomMethod is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Http\Method
 */
final class CustomMethod implements MethodInterface
{
    /**
     * @param non-empty-string $name
     * @param bool $safe
     * @param bool $idempotent
     */
    public function __construct(
        private readonly string $name,
        private readonly bool $safe = false,
        private readonly bool $idempotent = false,
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
}
