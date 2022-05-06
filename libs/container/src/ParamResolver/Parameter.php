<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\ParamResolver;

final class Parameter
{
    /**
     * @var \ReflectionType|null
     */
    private static ?\ReflectionType $mixed = null;

    /**
     * @param \ReflectionParameter $parameter
     */
    private function __construct(
        private readonly \ReflectionParameter $parameter
    ) {
    }

    /**
     * @return \ReflectionType
     */
    private static function mixed(): mixed
    {
        return self::$mixed ??= (new \ReflectionMethod(__CLASS__, __FUNCTION__))->getReturnType();
    }

    /**
     * @param \ReflectionParameter $parameter
     * @return static
     */
    public static function of(\ReflectionParameter $parameter): self
    {
        return new self($parameter);
    }

    /**
     * @return bool
     */
    public function isBuiltin(): bool
    {
        $type = $this->getType();

        return $type instanceof \ReflectionNamedType && $type->isBuiltin();
    }

    /**
     * @param object $instance
     * @return bool
     */
    public function allowsInstanceOf(object $instance): bool
    {
        return $this->match(static fn (\ReflectionNamedType $type): bool =>
            !$type->isBuiltin() && $instance instanceof ($type->getName())
        );
    }

    /**
     * @return bool
     */
    public function allowsScalar(): bool
    {
        return $this->match(static fn (\ReflectionNamedType $type): bool =>
            \in_array($type, ['bool', 'int', 'float', 'bool', 'true', 'false'], true)
        );
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
     * @param callable(\ReflectionNamedType):bool $match
     * @return bool
     */
    public function match(callable $match): bool
    {
        return $this->matchType($this->getType(), $match);
    }

    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->parameter->getName();
    }

    /**
     * @return \ReflectionType
     */
    public function getType(): mixed
    {
        return $this->parameter->getType() ?? self::mixed();
    }

    /**
     * @return bool
     */
    public function isMixed(): bool
    {
        $type = $this->getType();

        return $type instanceof \ReflectionNamedType && $type->getName() === 'mixed';
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public function isNullable(): bool
    {
        if ($this->isMixed()) {
            return true;
        }

        $type = $this->getType();
        if ($type->allowsNull()) {
            return true;
        }

        return $this->parameter->isDefaultValueAvailable()
            && $this->parameter->getDefaultValue() === null;
    }
}
