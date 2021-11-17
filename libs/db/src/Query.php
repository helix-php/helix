<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database;

use Helix\Contracts\Database\QueryInterface;
use JetBrains\PhpStorm\Language;

/**
 * @psalm-import-type ParamKey from QueryInterface
 * @psalm-import-type ParamValue from QueryInterface
 *
 * @psalm-type QueryMode = Query::MODE_*
 */
class Query implements QueryInterface
{
    /**
     * @var non-empty-string
     */
    protected readonly string $query;

    /**
     * @var array<ParamKey, ParamValue>
     */
    protected array $params = [];

    /**
     * @psalm-taint-sink sql $query
     * @param non-empty-string $query
     * @param iterable<ParamKey, ParamValue> $params
     *
     * @psalm-suppress PropertyTypeCoercion
     */
    public function __construct(
        #[Language('SQL')] string $query,
        iterable $params = []
    ) {
        $this->query = \trim($query);

        assert($this->query !== '');

        foreach ($params as $key => $value) {
            $this->offsetSet($key, $value);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function with(int|string $param, mixed $value): static
    {
        $self = clone $this;
        $self->offsetSet($param, $value);

        return $self;
    }

    /**
     * {@inheritDoc}
     */
    public function without(int|string $param): static
    {
        $self = clone $this;
        $self->offsetUnset($param);

        return $self;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->params);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetExists(mixed $offset): bool
    {
        \assert(\is_string($offset) || (\is_int($offset) && $offset >= 0));

        return isset($this->params[$offset]) || \array_key_exists($offset, $this->params);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetGet(mixed $offset): mixed
    {
        \assert(\is_string($offset) || (\is_int($offset) && $offset >= 0));

        return $this->params[$offset] ?? null;
    }

    /**
     * {@inheritDoc}
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        \assert(\is_string($offset) || (\is_int($offset) && $offset >= 0));
        \assert(\is_scalar($value));

        $this->params[$offset] = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function offsetUnset(mixed $offset): void
    {
        \assert(\is_string($offset) || (\is_int($offset) && $offset >= 0));

        unset($this->params[$offset]);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->query;
    }
}
