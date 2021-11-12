<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\ParamResolver;

/**
 * @internal TypeReader is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Container
 */
final class TypeReader
{
    /**
     * @var \ReflectionNamedType
     */
    private \ReflectionNamedType $mixed;

    /**
     * @throws \ReflectionException
     */
    public function __construct()
    {
        $this->mixed = $this->createMixedType();
    }

    /**
     * @return \ReflectionNamedType
     * @throws \ReflectionException
     */
    private function createMixedType(): \ReflectionNamedType
    {
        $method = new \ReflectionFunction(static fn (): mixed => null);
        $result = $method->getReturnType();

        assert($result instanceof \ReflectionNamedType);

        return $result;
    }

    /**
     * @param \ReflectionFunctionAbstract $fn
     * @return \Traversable
     */
    public function read(\ReflectionFunctionAbstract $fn): \Traversable
    {
        foreach ($fn->getParameters() as $parameter) {
            yield $parameter => $this->getTypes($parameter);
        }
    }

    /**
     * @param \ReflectionParameter $param
     * @return array<\ReflectionNamedType>
     */
    private function getTypes(\ReflectionParameter $param): array
    {
        $type = $param->getType();

        return match (true) {
            $type instanceof \ReflectionUnionType => $type->getTypes(),
            $type instanceof \ReflectionNamedType => [$type],
            default => [$this->mixed],
        };
    }
}
