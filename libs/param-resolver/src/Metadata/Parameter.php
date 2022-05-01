<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata;

use Helix\ParamResolver\Metadata\Type\TypeInterface;

/**
 * @template T of TypeInterface
 * @template-implements ParameterInterface<T>
 */
final class Parameter implements ParameterInterface
{
    /**
     * @param non-empty-string $name
     * @param TypeInterface $type
     * @param mixed|null $default
     * @param bool $hasDefault
     * @param bool $isVariadic
     * @param bool $isPromoted
     * @param array<object> $attributes
     */
    public function __construct(
        public readonly string $name,
        public readonly TypeInterface $type,
        public readonly mixed $default = null,
        public readonly bool $hasDefault = false,
        public readonly bool $isVariadic = false,
        public readonly bool $isPromoted = false,
        public readonly array $attributes = [],
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function isNullable(): bool
    {
        return $this->type->isNullable();
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
    public function getType(): TypeInterface
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultValue(): mixed
    {
        return $this->default;
    }

    /**
     * {@inheritDoc}
     */
    public function hasDefaultValue(): bool
    {
        return $this->hasDefault;
    }

    /**
     * {@inheritDoc}
     */
    public function isVariadic(): bool
    {
        return $this->isVariadic;
    }

    /**
     * {@inheritDoc}
     */
    public function isPromoted(): bool
    {
        return $this->isPromoted;
    }

    /**
     * {@inheritDoc}
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
