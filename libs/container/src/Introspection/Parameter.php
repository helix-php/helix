<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\Introspection;

final class Parameter
{
    /**
     * @var \ReflectionType|null
     */
    private static ?\ReflectionType $mixed = null;

    /**
     * @var Type
     */
    public readonly Type $type;

    /**
     * @param \ReflectionParameter $parameter
     */
    private function __construct(
        private readonly \ReflectionParameter $parameter
    ) {
        $this->type = Type::fromParameter($this->parameter);
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
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->parameter->getName();
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public function isNullable(): bool
    {
        if ($this->type->isNullable()) {
            return true;
        }

        return $this->parameter->isDefaultValueAvailable()
            && $this->parameter->getDefaultValue() === null;
    }
}
