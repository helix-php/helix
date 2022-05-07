<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot\Extension\Metadata;

use Helix\Boot\Attribute\ClassMetadataInterface;
use Helix\Boot\Attribute\MethodMetadataInterface;

final class AttributesMetadataProvider extends MetadataProvider
{
    /**
     * @var class-string
     */
    private const DEFAULT_CLASS_METADATA = ClassMetadataInterface::class;

    /**
     * @var class-string
     */
    private const DEFAULT_METHOD_METADATA = MethodMetadataInterface::class;

    /**
     * @param \ReflectionClass $context
     * @param class-string $classMetadata
     * @param class-string $methodMetadata
     */
    public function __construct(
        \ReflectionClass $context,
        private readonly string $classMetadata = self::DEFAULT_CLASS_METADATA,
        private readonly string $methodMetadata = self::DEFAULT_METHOD_METADATA,
    ) {
        $this->loadAttributes($context);
    }

    /**
     * @param \ReflectionClass $reflection
     * @return void
     */
    private function loadAttributes(\ReflectionClass $reflection): void
    {
        foreach ($this->classAttributes($reflection) as $meta) {
            $this->class[] = $meta;
        }

        foreach ($this->methodAttributes($reflection) as $callback => $meta) {
            $this->methods[] = [$callback, $meta];
        }
    }

    /**
     * @param \ReflectionClass $reflection
     * @return iterable<ClassMetadataInterface>
     */
    private function classAttributes(\ReflectionClass $reflection): iterable
    {
        $attributes = $reflection->getAttributes($this->classMetadata, \ReflectionAttribute::IS_INSTANCEOF);

        foreach ($attributes as $attribute) {
            yield $attribute->newInstance();
        }
    }

    /**
     * @param \ReflectionClass $reflection
     * @return iterable<\ReflectionMethod, MethodMetadataInterface>
     * @psalm-suppress InvalidReturnType
     */
    private function methodAttributes(\ReflectionClass $reflection): iterable
    {
        $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            // Skip non-invokable methods
            if ($method->isStatic() || $method->isAbstract()) {
                continue;
            }

            $attributes = $method->getAttributes($this->methodMetadata, \ReflectionAttribute::IS_INSTANCEOF);

            foreach ($attributes as $attribute) {
                yield $method => $attribute->newInstance();
            }
        }
    }
}
