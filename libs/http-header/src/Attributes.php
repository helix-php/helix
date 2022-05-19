<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Header;

use Helix\Contracts\Arrayable\ArrayableInterface;
use Helix\Contracts\Http\Header\Attribute\AttributeInterface;
use Helix\Contracts\Http\Header\Attribute\FlagInterface;
use Helix\Http\Header\Attribute\Attribute;
use Helix\Http\Header\Attribute\Flag;

/**
 * @template-implements \IteratorAggregate<array-key, FlagInterface|AttributeInterface>
 * @template-implements ArrayableInterface<array-key, FlagInterface|AttributeInterface>
 */
final class Attributes implements
    ArrayableInterface,
    \IteratorAggregate,
    \Countable,
    \Stringable
{
    /**
     * Attributes list delimiter.
     *
     * @var non-empty-string
     */
    final public const DELIMITER = ';';

    /**
     * @var array<non-empty-lowercase-string, FlagInterface|AttributeInterface>
     */
    private array $attributes = [];

    /**
     * @param iterable<FlagInterface|AttributeInterface> $attributes
     * @param non-empty-string $delimiter
     */
    public function __construct(
        iterable $attributes = [],
        private string $delimiter = self::DELIMITER
    ) {
        foreach ($attributes as $attribute) {
            $this->attributes[\strtolower($attribute->getName())] = $attribute;
        }
    }

    /**
     * @param iterable $attributes
     * @return iterable<FlagInterface>
     */
    public static function filter(iterable $attributes): iterable
    {
        foreach ($attributes as $attribute) {
            if ($attribute instanceof FlagInterface) {
                yield $attribute;
            }
        }
    }

    /**
     * @param iterable $attributes
     * @param non-empty-string $delimiter
     * @return string
     */
    public static function build(iterable $attributes, string $delimiter = self::DELIMITER): string
    {
        return (string)new self(self::filter($attributes), $delimiter);
    }

    /**
     * @param string $value
     * @param non-empty-string $delimiter
     * @param non-empty-string $kvDelimiter
     * @return self
     */
    public static function parse(
        string $value,
        string $delimiter = self::DELIMITER,
        string $kvDelimiter = Attribute::DELIMITER,
    ): self {
        if ($value === '') {
            return new self([], $delimiter);
        }

        $attributes = [];

        foreach (\explode($delimiter, $value) as $attribute) {
            $parts = \explode($kvDelimiter, $attribute);

            // Ignore empty keys
            if (($key = \array_shift($parts)) === '') {
                continue;
            }

            $attributes[] = match (\count($parts)) {
                0 => new Flag($key),
                1 => new Attribute($key, \reset($parts), $kvDelimiter),
                default => new Attribute($key, \implode($kvDelimiter, $parts), $kvDelimiter)
            };
        }

        return new self($attributes, $delimiter);
    }

    /**
     * @param non-empty-string|null $key
     * @return FlagInterface|AttributeInterface|null
     */
    public function fetch(string $key = null): FlagInterface|AttributeInterface|null
    {
        if ($key === null) {
            if ($this->attributes === []) {
                return null;
            }

            return \array_shift($this->attributes);
        }

        $key = \strtolower($key);
        if (isset($this->attributes[$key])) {
            $value = $this->attributes[$key];
            unset($this->attributes[$key]);

            return $value;
        }

        return null;
    }

    /**
     * @param non-empty-string|null $key
     * @return AttributeInterface|null
     */
    public function fetchAttribute(string $key = null): AttributeInterface|null
    {
        $key = \is_string($key) ? \strtolower($key) : null;

        foreach ($this->attributes as $i => $attribute) {
            if ($attribute instanceof AttributeInterface && ($key === null || $key === $i)) {
                unset($this->attributes[$i]);

                return $attribute;
            }
        }

        return null;
    }

    /**
     * @param non-empty-string|null $key
     * @return FlagInterface|null
     */
    public function fetchFlag(string $key = null): FlagInterface|null
    {
        $key = \is_string($key) ? \strtolower($key) : null;

        foreach ($this->attributes as $i => $flag) {
            if ((!$flag instanceof AttributeInterface) && ($key === null || $key === $i)) {
                unset($this->attributes[$i]);

                return $flag;
            }
        }

        return null;
    }

    /**
     * @return FlagInterface|AttributeInterface|null
     */
    public function first(): FlagInterface|AttributeInterface|null
    {
        return \reset($this->attributes) ?: null;
    }

    /**
     * @return non-empty-string
     */
    public function getDelimiter(): string
    {
        return $this->delimiter;
    }

    /**
     * @psalm-immutable
     * @param non-empty-string $delimiter
     * @return $this
     */
    public function withDelimiter(string $delimiter): self
    {
        $self = clone $this;
        $self->setDelimiter($delimiter);

        return $self;
    }

    /**
     * @param non-empty-string $delimiter
     * @return void
     */
    public function setDelimiter(string $delimiter): void
    {
        $this->delimiter = $delimiter;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->attributes);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return \count($this->attributes);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        $result = [];

        foreach ($this->attributes as $attribute) {
            $result[] = (string)$attribute;
        }

        return \implode($this->delimiter, $result);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return \iterator_to_array($this);
    }
}
