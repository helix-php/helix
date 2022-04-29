<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata;

use Helix\ParamResolver\Metadata\Type\IntersectionType;
use Helix\ParamResolver\Metadata\Type\UnionType;
use Helix\ParamResolver\MetadataInterface;

final class Parameter implements MetadataInterface
{
    /**
     * @param non-empty-string $name
     * @param TypeInterface $type
     * @param mixed|null $default
     * @param bool $hasDefault
     * @param bool $isVariadic
     * @param array<object> $attributes
     */
    public function __construct(
        public readonly string $name,
        public readonly TypeInterface $type,
        public readonly mixed $default = null,
        public readonly bool $hasDefault = false,
        public readonly bool $isVariadic = false,
        public readonly array $attributes = [],
    ) {
    }

    /**
     * @param non-empty-string $name
     * @param bool|null $nullable Expected type should allow NULL (true/false)
     *                            or doesn't matter.
     * @return bool
     */
    public function typeOf(string $name, bool $nullable = null): bool
    {
        if ($nullable !== true && $this->type instanceof Type) {
            return $this->type->is($name);
        }

        if ($nullable !== false && $this->type instanceof UnionType) {
            return $this->type->isNullableOf($name);
        }

        return false;
    }

    /**
     * @param bool|null $nullable
     * @return non-empty-string|null
     */
    public function getTypeName(bool $nullable = null): ?string
    {
        if ($nullable !== true && $this->type instanceof Type) {
            return $this->type->getName();
        }

        if (
            $nullable === false
            || !$this->type instanceof UnionType
            || $this->type->count() !== 2
        ) {
            return null;
        }

        foreach ($this->type->getTypes() as $type) {
            if (!$type instanceof Type || !$type->is('null')) {
                continue;
            }

            return $type->getName();
        }

        return null;
    }

    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return TypeInterface
     */
    public function getType(): TypeInterface
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getDefaultValue(): mixed
    {
        return $this->default;
    }

    /**
     * @return bool
     */
    public function hasDefaultValue(): bool
    {
        return $this->hasDefault;
    }

    /**
     * @return bool
     */
    public function isVariadic(): bool
    {
        return $this->isVariadic;
    }

    /**
     * @return array<object>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param \ReflectionParameter $param
     * @return static
     * @psalm-suppress MixedAssignment
     * @psalm-suppress ArgumentTypeCoercion
     */
    public static function fromReflection(\ReflectionParameter $param): self
    {
        [$default, $exists] = self::getReflectionDefaultValue($param);

        return new self(
            name: $param->getName(),
            type: self::getReflectionType($param),
            default: $default,
            hasDefault: $exists,
            attributes: [...self::getReflectionAttributes($param)],
        );
    }

    /**
     * @param \ReflectionParameter $param
     * @return iterable<object>
     */
    private static function getReflectionAttributes(\ReflectionParameter $param): iterable
    {
        foreach ($param->getAttributes() as $attribute) {
            yield $attribute->newInstance();
        }
    }

    /**
     * @param \ReflectionParameter $param
     * @return TypeInterface
     */
    private static function getReflectionType(\ReflectionParameter $param): TypeInterface
    {
        $type = $param->getType();

        if ($type === null) {
            return Type::mixed();
        }

        return Type::fromReflection($type);
    }

    /**
     * @param \ReflectionParameter $param
     * @return array{ mixed, bool }
     * @psalm-suppress MixedAssignment
     */
    private static function getReflectionDefaultValue(\ReflectionParameter $param): array
    {
        $default = null;

        if ($exists = $param->isDefaultValueAvailable()) {
            $default = $param->getDefaultValue();
        }

        return [$default, $exists];
    }
}
