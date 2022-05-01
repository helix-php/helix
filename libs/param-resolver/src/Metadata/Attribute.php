<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata;

final class Attribute implements AttributeInterface
{
    /**
     * @param class-string $class
     * @param array $arguments
     */
    public function __construct(
        private readonly string $class,
        private readonly array $arguments = [],
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function isExists(): bool
    {
        return \class_exists($this->class);
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->class;
    }

    /**
     * {@inheritDoc}
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * {@inheritDoc}
     */
    public function getReflection(): \ReflectionClass
    {
        return new \ReflectionClass($this->class);
    }

    /**
     * {@inheritDoc}
     */
    public function new(): object
    {
        return new ($this->class)(...$this->arguments);
    }

    /**
     * {@inheritDoc}
     */
    public function instanceOf(string $target): bool
    {
        return \is_a($this->class, $target, true);
    }
}
