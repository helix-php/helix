<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Header\Attribute;

use Helix\Contracts\Http\Header\Attribute\AttributeInterface;

class Attribute extends Flag implements AttributeInterface
{
    /**
     * Key-value attribute's delimiter.
     *
     * @var non-empty-string
     */
    final public const DELIMITER = '=';

    /**
     * @param non-empty-string $name
     * @param string|\Stringable $value
     * @param non-empty-string $delimiter
     */
    public function __construct(
        string $name,
        protected string|\Stringable $value,
        protected string $delimiter = self::DELIMITER,
    ) {
        parent::__construct($name);
    }

    /**
     * @param mixed $name
     * @param mixed|null $value
     * @return static|null
     */
    public static function createOrNull(mixed $name, mixed $value = null): ?self
    {
        $name = self::nameToStringOrNull($name);

        return match (true) {
            $name === null => null,
            $value instanceof \Stringable => new self($name, $value),
            \is_scalar($value) => new self($name, (string)$value),
            default => null,
        };
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
     * @return self
     */
    public function withDelimiter(string $delimiter): self
    {
        $self = clone $this;
        $self->delimiter = $delimiter;

        return $self;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return (string)$this->value;
    }

    /**
     * @psalm-immutable
     * @param string|\Stringable $value
     * @return self
     */
    public function withValue(string|\Stringable $value): self
    {
        $self = clone $this;
        $self->value = $value;

        return $self;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->name . $this->delimiter . $this->value;
    }
}
