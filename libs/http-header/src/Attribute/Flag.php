<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Header\Attribute;

use Helix\Contracts\Http\Header\Attribute\FlagInterface;

class Flag implements FlagInterface
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        protected string $name,
    ) {
        /** @psalm-suppress TypeDoesNotContainType */
        if ($this->name === '') {
            throw new \InvalidArgumentException('Name of the attribute cannot be empty');
        }
    }

    /**
     * @param mixed $name
     * @return self|null
     */
    public static function createOrNull(mixed $name): ?self
    {
        $name = self::nameToStringOrNull($name);

        return $name !== null ? new self($name) : null;
    }

    /**
     * @param mixed $name
     * @param bool $expr
     * @return self|null
     */
    public static function createIf(mixed $name, bool $expr): ?self
    {
        return $expr ? self::createOrNull($name) : null;
    }

    /**
     * @param mixed $name
     * @return non-empty-string|null
     */
    protected static function nameToStringOrNull(mixed $name): ?string
    {
        if (!\is_scalar($name) && !$name instanceof \Stringable) {
            return null;
        }

        $string = (string)$name;

        return $string !== '' ? $string : null;
    }

    /**
     * @psalm-immutable
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
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
