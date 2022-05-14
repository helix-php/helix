<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Introspection;

final class Type
{
    public const HINT_INT = 'int';
    public const HINT_FLOAT = 'float';
    public const HINT_STRING = 'string';
    public const HINT_BOOL = 'bool';
    public const HINT_CALLABLE = 'callable';
    public const HINT_ARRAY = 'array';
    public const HINT_SELF = 'self';
    public const HINT_PARENT = 'parent';

    /**
     * @since PHP 7.1
     */
    public const HINT_ITERABLE = 'iterable';

    /**
     * @since PHP 7.1
     */
    public const HINT_VOID = 'void';

    /**
     * @since PHP 7.2
     */
    public const HINT_OBJECT = 'object';

    /**
     * @since PHP 8.0
     */
    public const HINT_MIXED = 'mixed';

    /**
     * @since PHP 8.0
     */
    public const HINT_STATIC = 'static';

    /**
     * @since PHP 8.0
     */
    public const HINT_NULL = 'null';

    /**
     * @since PHP 8.1
     */
    public const HINT_NEVER = 'never';

    /**
     * @since PHP 8.1
     */
    public const HINT_FALSE = 'false';

    /**
     * @since PHP 8.2
     */
    public const HINT_TRUE = 'true';

    private const HINT_SCALARS = [
        self::HINT_INT,
        self::HINT_FLOAT,
        self::HINT_STRING,
        self::HINT_BOOL,
        self::HINT_FALSE,
        self::HINT_TRUE,
    ];

    /**
     * @var \ReflectionType|null
     */
    private static ?\ReflectionType $mixed = null;

    /**
     * @var \ReflectionType
     */
    private readonly \ReflectionType $type;

    /**
     * @param \ReflectionType|null $type
     */
    private function __construct(
        ?\ReflectionType $type,
    ) {
        $this->type = $type ?? self::mixed();
    }

    /**
     * @return \ReflectionType
     * @psalm-suppress NullableReturnStatement
     */
    public static function mixed(): mixed
    {
        return self::$mixed ??= (new \ReflectionMethod(__CLASS__, __FUNCTION__))->getReturnType();
    }

    /**
     * @param \ReflectionParameter $parameter
     * @return self
     */
    public static function fromParameter(\ReflectionParameter $parameter): self
    {
        return new self($parameter->getType());
    }

    /**
     * @return \ReflectionType
     */
    public function getType(): \ReflectionType
    {
        return $this->type;
    }

    /**
     * @param \ReflectionFunctionAbstract $fun
     * @return self
     */
    public static function fromReturnStatement(\ReflectionFunctionAbstract $fun): self
    {
        return new self($fun->getReturnType());
    }

    /**
     * @return bool
     */
    public function isIterable(): bool
    {
        return $this->type instanceof \ReflectionNamedType
            && $this->matchIterable($this->type);
    }

    /**
     * @return bool
     */
    public function allowsIterable(): bool
    {
        return $this->match($this->matchIterable(...));
    }

    /**
     * @return bool
     */
    public function isBuiltin(): bool
    {
        return $this->type instanceof \ReflectionNamedType
            && $this->matchBuiltin($this->type);
    }

    /**
     * @return bool
     */
    public function allowsBuiltin(): bool
    {
        return $this->match($this->matchBuiltin(...));
    }

    /**
     * @return bool
     */
    public function isScalar(): bool
    {
        return $this->type instanceof \ReflectionNamedType
            && $this->matchScalar($this->type);
    }

    /**
     * @return bool
     */
    public function allowsScalar(): bool
    {
        return $this->match($this->matchScalar(...));
    }

    /**
     * @param callable(\ReflectionNamedType):bool $match
     * @return bool
     */
    public function match(callable $match): bool
    {
        return $this->matchType($this->type, $match);
    }

    /**
     * @param object $instance
     * @return bool
     */
    public function isInstanceOf(object $instance): bool
    {
        return $this->type instanceof \ReflectionNamedType
            && $this->matchInstanceOf($this->type, $instance);
    }

    /**
     * @param object $instance
     * @return bool
     */
    public function allowsInstanceOf(object $instance): bool
    {
        return $this->match(fn (\ReflectionNamedType $type): bool =>
            $this->matchInstanceOf($type, $instance)
        );
    }

    /**
     * @param class-string $class
     * @return bool
     */
    public function isSubclassOf(string $class): bool
    {
        return $this->type instanceof \ReflectionNamedType
            && $this->matchSubclassOf($this->type, $class);
    }

    /**
     * @param class-string $class
     * @return bool
     */
    public function allowsSubclassOf(string $class): bool
    {
        return $this->match(fn (\ReflectionNamedType $type): bool =>
            $this->matchSubclassOf($type, $class)
        );
    }

    /**
     * @param \ReflectionNamedType $type
     * @param class-string $expected
     * @return bool
     */
    private function matchSubclassOf(\ReflectionNamedType $type, string $expected): bool
    {
        return !$type->isBuiltin() && \is_a($type->getName(), $expected, true);
    }

    /**
     * @return bool
     */
    public function isNullable(): bool
    {
        if ($this->isMixed()) {
            return true;
        }

        return $this->type->allowsNull();
    }

    /**
     * @return bool
     */
    public function isMixed(): bool
    {
        return $this->type instanceof \ReflectionNamedType
            && $this->type->getName() === 'mixed';
    }

    /**
     * @param \ReflectionNamedType $type
     * @return bool
     */
    private function matchIterable(\ReflectionNamedType $type): bool
    {
        return $type->isBuiltin()
            && $type->getName() === self::HINT_ITERABLE;
    }

    /**
     * @param \ReflectionNamedType $type
     * @return bool
     */
    private function matchBuiltin(\ReflectionNamedType $type): bool
    {
        return $type->isBuiltin();
    }

    /**
     * @param \ReflectionNamedType $type
     * @return bool
     */
    private function matchScalar(\ReflectionNamedType $type): bool
    {
        return \in_array($type->getName(), self::HINT_SCALARS, true);
    }

    /**
     * @param \ReflectionType $type
     * @param callable(\ReflectionNamedType):bool $match
     * @return bool
     */
    private function matchType(\ReflectionType $type, callable $match): bool
    {
        return match (true) {
            $type instanceof \ReflectionNamedType => (bool)$match($type),
            $type instanceof \ReflectionUnionType => $this->matchUnionType($type, $match),
            $type instanceof \ReflectionIntersectionType => $this->matchIntersectionType($type, $match),
            default => false,
        };
    }

    /**
     * @param \ReflectionUnionType $type
     * @param callable(\ReflectionNamedType):bool $match
     * @return bool
     */
    private function matchUnionType(\ReflectionUnionType $type, callable $match): bool
    {
        foreach ($type->getTypes() as $child) {
            if ($this->matchType($child, $match)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param \ReflectionIntersectionType $type
     * @param callable(\ReflectionNamedType):bool $match
     * @return bool
     */
    private function matchIntersectionType(\ReflectionIntersectionType $type, callable $match): bool
    {
        foreach ($type->getTypes() as $child) {
            if (!$this->matchType($child, $match)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param \ReflectionNamedType $type
     * @param object $expected
     * @return bool
     */
    private function matchInstanceOf(\ReflectionNamedType $type, object $expected): bool
    {
        return !$type->isBuiltin() && $expected instanceof ($type->getName());
    }
}
