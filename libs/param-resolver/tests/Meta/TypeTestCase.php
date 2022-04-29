<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Tests\Meta;

use Helix\ParamResolver\Metadata\Type;
use Helix\ParamResolver\Metadata\Type\UnionType;

class TypeTestCase extends MetaTestCase
{
    private function out(string $type): \ReflectionType
    {
        $class = '__VirtualClass' . \bin2hex(\random_bytes(32));
        $function = 'foo' . \bin2hex(\random_bytes(32));

        eval(<<<PHP
            abstract class {$class} extends \StdClass
            {
                abstract public function {$function}(): {$type};
            }
        PHP);

        return (new \ReflectionMethod($class, $function))->getReturnType();
    }

    public function builtinStandaloneTypesDataProvider(): array
    {
        return [
            'int' => ['int'],
            'float' => ['float'],
            'string' => ['string'],
            'bool' => ['bool'],
            'callable' => ['callable'],
            'array' => ['array'],
            'iterable' => ['iterable'],
            'object' => ['object'],
            'void' => ['void'],
            'never' => ['never'],
        ];
    }

    public function builtinStandaloneNullableTypesDataProvider(): array
    {
        return [
            'mixed' => ['mixed'],
        ];
    }

    public function builtinUnionTypesDataProvider(): array
    {
        return [
            'false' => ['false'],

            // Not implemented yet
            // 'true' => ['true'],
        ];
    }

    /**
     * @dataProvider builtinStandaloneTypesDataProvider
     */
    public function testStandaloneBuiltin(string $name): void
    {
        $reflection = $this->out($name);

        $this->assertInstanceOf(\ReflectionNamedType::class, $reflection);

        $type = Type::fromReflection($reflection);

        $this->assertInstanceOf(Type::class, $type);
        $this->assertSame($name, $type->getName());
        $this->assertTrue($type->isBuiltin());
        $this->assertFalse($type->isNullable());
    }

    /**
     * @dataProvider builtinUnionTypesDataProvider
     */
    public function testUnionBuiltin(string $name): void
    {
        $reflection = $this->out($name . '|int');

        $this->assertInstanceOf(\ReflectionUnionType::class, $reflection);

        $type = Type::fromReflection($reflection);

        $this->assertInstanceOf(UnionType::class, $type);
        $this->assertFalse($type->isNullable());

        $this->assertCount(2, $type);
        $this->assertInstanceOf(Type::class, $type[1]);
        $this->assertFalse($type[1]->isNullable());
        $this->assertSame($name, $type[1]->getName());
        $this->assertTrue($type[1]->isBuiltin());
    }

    /**
     * @dataProvider builtinStandaloneNullableTypesDataProvider
     */
    public function testNullableStandaloneBuiltin(string $name): void
    {
        $reflection = $this->out($name);

        $this->assertInstanceOf(\ReflectionNamedType::class, $reflection);

        $type = Type::fromReflection($reflection);

        $this->assertInstanceOf(UnionType::class, $type);
        $this->assertTrue($type->isNullable());

        $this->assertInstanceOf(Type::class, $type[0]);
        $this->assertSame($name, $type[0]->getName());
        $this->assertTrue($type[0]->isBuiltin());
        $this->assertTrue($type[0]->isNullable());

        $this->assertInstanceOf(Type::class, $type[1]);
        $this->assertSame('null', $type[1]->getName());
        $this->assertTrue($type[1]->isBuiltin());
        $this->assertTrue($type[1]->isNullable());
    }

    public function testOptionalExtraction(): void
    {
        $reflection = $this->out('?int');

        $type = Type::fromReflection($reflection);

        $this->assertInstanceOf(UnionType::class, $type);
        $this->assertCount(2, $type);

        $this->assertSame('int', $type[0]->getName());
        $this->assertSame('null', $type[1]->getName());
    }

    public function testUnionOptionalExtraction(): void
    {
        $reflection = $this->out('int|false|null');

        $type = Type::fromReflection($reflection);

        $this->assertInstanceOf(UnionType::class, $type);
        $this->assertCount(3, $type);

        $this->assertSame('int', $type[0]->getName());
        $this->assertSame('false', $type[1]->getName());
        $this->assertSame('null', $type[2]->getName());
    }
}
