<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata\Type;

abstract class Composite implements CompositeTypeInterface
{
    /**
     * @var array<positive-int|0, TypeInterface>
     */
    private readonly array $types;

    /**
     * @var bool|null
     */
    private ?bool $nullable = null;

    /**
     * @param TypeInterface $first
     * @param TypeInterface $second
     * @param TypeInterface ...$other
     */
    final public function __construct(
        TypeInterface $first,
        TypeInterface $second,
        TypeInterface ...$other,
    ) {
        /** @psalm-suppress PropertyTypeCoercion */
        $this->types = [...$this->unique(
            $this->extractsNull(
                $this->unwrap([$first, $second, ...$other])
            )
        )];
    }

    /**
     * @return iterable<TypeInterface>
     */
    public function getTypes(): iterable
    {
        return $this->types;
    }

    /**
     * @param iterable<TypeInterface> $types
     * @return iterable<TypeInterface>
     */
    protected function unique(iterable $types): iterable
    {
        $expected = [];

        foreach ($types as $type) {
            if ($type instanceof Type) {
                if (\in_array($type->getName(), $expected, true)) {
                    continue;
                }

                $expected[] = $type->getName();
            }

            yield $type;
        }
    }

    /**
     * @param iterable<TypeInterface> $types
     * @return iterable<TypeInterface>
     */
    protected function extractsNull(iterable $types): iterable
    {
        foreach ($types as $type) {
            if ($type->isNullable()) {
                $this->nullable = true;
            }

            yield $type;
        }
    }

    /**
     * @param iterable<TypeInterface> $types
     * @return iterable<TypeInterface>
     */
    protected function unwrap(iterable $types): iterable
    {
        foreach ($types as $type) {
            if ($type instanceof static) {
                yield from $this->unwrap($type->getTypes());
            } else {
                yield $type;
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function isNullable(): bool
    {
        if ($this->nullable === null) {
            foreach ($this->types as $type) {
                if ($type->isNullable()) {
                    return $this->nullable = true;
                }
            }

            return $this->nullable = false;
        }

        return $this->nullable;
    }

    /**
     * {@inheritDoc}
     */
    public function offsetExists($offset): bool
    {
        /** @psalm-suppress RedundantConditionGivenDocblockType */
        assert(\is_int($offset), 'Offset must be of type int');

        return isset($this->types[$offset]);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetGet($offset): TypeInterface
    {
        /** @psalm-suppress RedundantConditionGivenDocblockType */
        assert(\is_int($offset), 'Offset must be of type int');

        if (!isset($this->types[$offset])) {
            throw new \OutOfBoundsException('Type #' . $offset . ' has not been defined');
        }

        return $this->types[$offset];
    }

    /**
     * {@inheritDoc}
     */
    public function offsetSet($offset, $value): void
    {
        throw new \BadFunctionCallException('Can not add type into ' . static::class);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetUnset($offset): void
    {
        throw new \BadFunctionCallException('Can not remove type from ' . static::class);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->types);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return \count($this->types);
    }
}
