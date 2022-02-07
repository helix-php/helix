<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config;

use Helix\Config\Exception\ValidatorException;

/**
 * @psalm-type PathDelimiter = non-empty-string
 *
 * @template-implements EntryInterface<non-empty-string>
 */
class Entry implements EntryInterface
{
    /**
     * @var PathDelimiter
     */
    public const PATH_DEPTH_DELIMITER = '>';

    /**
     * @var non-empty-string
     */
    private const ERROR_INVALID_KEY = 'Key %s is not a valid key for the configuration';

    /**
     * @var non-empty-string
     */
    private const ERROR_INVALID_KEY_FROM_ARRAY = self::ERROR_INVALID_KEY . ' (did you mean "%s"?)';

    /**
     * @param array<non-empty-string, mixed> $config
     * @param PathDelimiter $delimiter
     */
    public function __construct(
        protected readonly array $config = [],
        protected readonly string $delimiter = self::PATH_DEPTH_DELIMITER,
    ) {
    }

    /**
     * @param non-empty-string $key
     * @param mixed $context
     * @return bool
     */
    private function keyExists(string $key, mixed $context): bool
    {
        return match (true) {
            \is_array($context) => \array_key_exists($key, $context),
            \is_object($context) => \property_exists($context, $key),
            default => false,
        };
    }

    /**
     * @param non-empty-string $key
     * @param mixed $context
     * @return mixed
     */
    private function keyGet(string $key, mixed $context): mixed
    {
        return match (true) {
            \is_array($context) => $context[$key],
            \is_object($context) => (fn () => $this->$key)->call($context),
            default => false,
        };
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $key): mixed
    {
        $config = $this->config;
        $segments = $this->segments($key);

        foreach ($segments as $segment) {
            if (! $this->keyExists($segment, $config)) {
                throw new \InvalidArgumentException($this->invalidKeyErrorMessage($segment, $segments, $config));
            }

            $config = $this->keyGet($segment, $config);
        }

        return $config;
    }

    /**
     * {@inheritDoc}
     */
    public function find(string $key, mixed $default = null): mixed
    {
        $config = $this->config;

        foreach ($this->segments($key) as $segment) {
            if (! $this->keyExists($segment, $config)) {
                return $default;
            }

            $config = $this->keyGet($segment, $config);
        }

        return $config;
    }

    /**
     * {@inheritDoc}
     */
    public function has(string $key): bool
    {
        $config = $this->config;

        foreach ($this->segments($key) as $segment) {
            if (! $this->keyExists($segment, $config)) {
                return true;
            }

            $config = $this->keyGet($segment, $config);
        }

        return false;
    }

    /**
     * @param non-empty-string $current
     * @param list<non-empty-string> $segments
     * @param mixed $context
     * @return non-empty-string
     */
    private function invalidKeyErrorMessage(string $current, array $segments, mixed $context): string
    {
        $key = $current === $segments
            ? $current
            : \sprintf('"%s" in [%s]', $current, $this->prettifyKey($segments))
        ;

        if (\is_array($context)) {
            return \sprintf(self::ERROR_INVALID_KEY_FROM_ARRAY, $key, $this->coerceKey($current, $context));
        }

        return \sprintf(self::ERROR_INVALID_KEY, $key);

    }

    /**
     * @param string $actual
     * @param array $expected
     * @return string
     */
    protected function coerceKey(string $actual, array $expected): string
    {
        $result = [];

        foreach ($expected as $key => $_) {
            $result[$key] = \levenshtein($actual, (string)$key);
        }

        \asort($result);

        return (string)\array_key_first($result);
    }

    /**
     * @param non-empty-string $key
     * @return list<non-empty-string>
     */
    private function segments(string $key): array
    {
        $segments = \explode($this->delimiter, $key);
        $segments = \array_map('\\trim', $segments);

        return \array_filter($segments, static fn (string $value): bool => $value !== '');
    }

    /**
     * @param list<non-empty-string> $segments
     * @return non-empty-string
     */
    private function prettifyKey(array $segments): string
    {
        return \implode(\sprintf(' %s ', $this->delimiter), $segments);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetExists(mixed $offset): bool
    {
        assert(\is_string($offset), 'Precondition [offset is string] failed');

        return $this->has($offset);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetGet(mixed $offset): mixed
    {
        assert(\is_string($offset), 'Precondition [offset is string] failed');

        return $this->get($offset);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        assert(\is_string($offset), 'Precondition [offset is string] failed');

        throw new \LogicException('Can not update immutable object');
    }

    /**
     * {@inheritDoc}
     */
    public function offsetUnset(mixed $offset): void
    {
        assert(\is_string($offset), 'Precondition [offset is string] failed');

        throw new \LogicException('Can not update immutable object');
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->config);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return $this->config;
    }
}
