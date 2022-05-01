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
use Helix\ParamResolver\Metadata\Type\Type;
use Helix\ParamResolver\Metadata\Type\TypeInterface;
use Helix\ParamResolver\Metadata\Type\UnionType;

/**
 * @internal Factory is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\ParamResolver
 */
final class Factory
{
    /**
     * @var non-empty-string
     */
    private const ERROR_UNSUPPORTED_TYPE = 'Can not determine reflection type of %s';

    /**
     * @param \ReflectionType $type
     * @return TypeInterface
     */
    public function fromReflectionType(\ReflectionType $type): TypeInterface
    {
        return match (true) {
            $type instanceof \ReflectionNamedType => $this->fromReflectionNamedType($type),
            $type instanceof \ReflectionUnionType => $this->fromReflectionUnionType($type),
            $type instanceof \ReflectionIntersectionType => $this->fromReflectionIntersectionType($type),
            default =>  throw new \InvalidArgumentException(
                \sprintf(self::ERROR_UNSUPPORTED_TYPE, $type::class)
            ),
        };
    }

    /**
     * @param \ReflectionParameter $param
     * @return ParameterInterface
     * @psalm-suppress MixedAssignment
     * @psalm-suppress ArgumentTypeCoercion
     */
    public function fromReflectionParameter(\ReflectionParameter $param): ParameterInterface
    {
        $default = null;

        if ($exists = $param->isDefaultValueAvailable()) {
            $default = $param->getDefaultValue();
        }

        return new Parameter(
            name: $param->getName(),
            type: $this->paramType($param),
            default: $default,
            hasDefault: $exists,
            isVariadic: $param->isVariadic(),
            isPromoted: $param->isPromoted(),
            attributes: [...$this->paramAttributes($param)],
        );
    }

    /**
     * @param \ReflectionParameter $param
     * @return iterable<object>
     */
    private function paramAttributes(\ReflectionParameter $param): iterable
    {
        foreach ($param->getAttributes() as $attribute) {
            /** @psalm-suppress ArgumentTypeCoercion */
            yield new Attribute(
                $attribute->getName(),
                $attribute->getArguments(),
            );
        }

        return [];
    }

    /**
     * @param \ReflectionParameter $param
     * @return TypeInterface
     */
    private function paramType(\ReflectionParameter $param): TypeInterface
    {
        $type = $param->getType();

        if ($type === null) {
            return Type::mixed();
        }

        return $this->fromReflectionType($type);
    }

    /**
     * @param \ReflectionNamedType $type
     * @return TypeInterface
     * @psalm-suppress ArgumentTypeCoercion
     */
    public function fromReflectionNamedType(\ReflectionNamedType $type): TypeInterface
    {
        $result = new Type($type->getName(), $type->isBuiltin(), $type->allowsNull());

        if ($type->allowsNull()) {
            return new UnionType($result, Type::null());
        }

        return $result;
    }

    /**
     * @param \ReflectionUnionType $union
     * @return UnionType
     */
    public function fromReflectionUnionType(\ReflectionUnionType $union): UnionType
    {
        $types = [];

        foreach ($union->getTypes() as $reflection) {
            $types[] = $this->fromReflectionType($reflection);
        }

        return new UnionType(...$types);
    }

    /**
     * @param \ReflectionIntersectionType $type
     * @return IntersectionType
     */
    public function fromReflectionIntersectionType(\ReflectionIntersectionType $type): IntersectionType
    {
        $types = [];

        foreach ($type->getTypes() as $type) {
            $types[] = $this->fromReflectionType($type);
        }

        return new IntersectionType(...$types);
    }
}
