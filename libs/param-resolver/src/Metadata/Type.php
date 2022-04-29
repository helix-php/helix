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

final class Type implements TypeInterface
{
    /**
     * @var non-empty-list<non-empty-string> & non-empty-list<lowercase-string>
     */
    private const BUILT_IN_TYPES = [
        'int',
        'float',
        'string',
        'bool',
        'callable',
        'array',
        'iterable',
        'object',
        'void',
        'mixed',
        'null',
        'never',
        'false',

        // @link https://externals.io/message/117500
        // @link https://wiki.php.net/rfc/true-type
        'true',
    ];

    /**
     * @var non-empty-list<non-empty-string> & non-empty-list<lowercase-string>
     */
    private const NULLABLE_TYPES = [
        'null',
        'mixed',
    ];

    /**
     * @var non-empty-string & lowercase-string
     */
    private readonly string $lower;

    /**
     * @param non-empty-string $name
     * @param bool|null $builtin
     * @param bool|null $nullable
     */
    public function __construct(
        public readonly string $name,
        private ?bool $builtin = null,
        private ?bool $nullable = null,
    ) {
        $this->lower = \strtolower($this->name);
    }

    /**
     * {@inheritDoc}
     */
    public function is(string $name): bool
    {
        return $this->lower === \strtolower($name);
    }

    /**
     * @param \ReflectionType $type
     * @return TypeInterface
     */
    public static function fromReflection(\ReflectionType $type): TypeInterface
    {
        if ($type instanceof \ReflectionNamedType) {
            return self::fromReflectionNamed($type);
        }

        if ($type instanceof \ReflectionUnionType) {
            return self::fromReflectionUnion($type);
        }

        if ($type instanceof \ReflectionIntersectionType) {
            return self::fromReflectionIntersection($type);
        }

        throw new \InvalidArgumentException(
            'Can not determine reflection type of ' . $type::class
        );
    }

    /**
     * @param \ReflectionNamedType $type
     * @return TypeInterface
     * @psalm-suppress ArgumentTypeCoercion
     */
    private static function fromReflectionNamed(\ReflectionNamedType $type): TypeInterface
    {
        $result = new self($type->getName(), $type->isBuiltin(), $type->allowsNull());

        if ($type->allowsNull()) {
            return new UnionType($result, self::null());
        }

        return $result;
    }

    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return non-empty-string & lowercase-string
     */
    public function getId(): string
    {
        return $this->lower;
    }

    /**
     * @return bool
     */
    public function isBuiltin(): bool
    {
        return $this->builtin ??= \in_array($this->lower, self::BUILT_IN_TYPES, true);
    }

    /**
     * @return static
     */
    public static function null(): self
    {
        return new self('null', true, true);
    }

    /**
     * @param \ReflectionUnionType $union
     * @return UnionType
     */
    private static function fromReflectionUnion(\ReflectionUnionType $union): UnionType
    {
        $types = [];

        foreach ($union->getTypes() as $reflection) {
            $types[] = self::fromReflection($reflection);
        }

        return new UnionType(...$types);
    }

    /**
     * @param \ReflectionIntersectionType $type
     * @return IntersectionType
     */
    private static function fromReflectionIntersection(\ReflectionIntersectionType $type): IntersectionType
    {
        $types = [];

        foreach ($type->getTypes() as $type) {
            $types[] = self::fromReflection($type);
        }

        return new IntersectionType(...$types);
    }

    /**
     * @return static
     */
    public static function mixed(): self
    {
        return new self('mixed', true, true);
    }

    /**
     * {@inheritDoc}
     */
    public function isNullable(): bool
    {
        return $this->nullable ??= \in_array($this->lower, self::NULLABLE_TYPES, true);
    }
}
