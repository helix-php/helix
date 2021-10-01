<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config;

class Repository implements RepositoryInterface
{
    /**
     * @var string
     */
    private const ERROR_INVALID_TYPE =
        'Can not read "%s" field from %s (non array|object) value along the path [%s]';

    /**
     * @var string
     */
    private const ERROR_INVALID_KEY =
        'An array { %s } contained along the path [%s] does not contain the key "%s"';

    /**
     * @var string
     */
    private const ERROR_INVALID_ARRAY_ACCESS_KEY =
        'An object(%s) implements ArrayAccess { %s } contained along the path [%s] does not contain the key "%s"';

    /**
     * @var string
     */
    private const ERROR_INVALID_FIELD =
        'An object(%s) { %s } contained along the path [%s] does not contain the field "%s"';

    /**
     * @var string
     */
    private const DEFAULT_KEY_DELIMITER = '.';

    /**
     * @param array<string, mixed>|\ArrayAccess<string, mixed> $config
     * @param non-empty-string $delimiter
     */
    public function __construct(
        private array|\ArrayAccess $config = [],
        private readonly string $delimiter = self::DEFAULT_KEY_DELIMITER
    ) {
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
    public function count(): int
    {
        return \count($this->config);
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $key): mixed
    {
        $chunks = \explode($this->delimiter, $key);
        $result = $this->config;
        $path = [];

        foreach ($chunks as $chunk) {
            /** @psalm-var mixed $result */
            $result = match (true) {
                \is_array($result) => \array_key_exists($chunk, $result)
                    ? $result[$chunk]
                    : throw new \InvalidArgumentException(
                        \vsprintf(self::ERROR_INVALID_KEY, [
                            \implode(', ', \array_keys($result)),
                            \implode('.', $path) ?: '.',
                            $chunk,
                        ])
                    ),
                $result instanceof \ArrayAccess => $result->offsetExists($chunk)
                    ? $result[$chunk]
                    : throw new \InvalidArgumentException(
                        \vsprintf(self::ERROR_INVALID_ARRAY_ACCESS_KEY, [
                            \get_class($result),
                            \implode(', ', \array_keys(\get_object_vars($result))),
                            \implode('.', $path) ?: '.',
                            $chunk,
                        ])
                    ),
                \is_object($result) => \property_exists($result, $chunk)
                    ? $result->$chunk
                    : throw new \InvalidArgumentException(
                        \vsprintf(self::ERROR_INVALID_FIELD, [
                            \get_class($result),
                            \implode(', ', \array_keys(\get_object_vars($result))),
                            \implode('.', $path) ?: '.',
                            $chunk,
                        ])
                    ),
                default => throw new \InvalidArgumentException(
                    \vsprintf(self::ERROR_INVALID_TYPE, [
                        $chunk,
                        \get_debug_type($result),
                        \implode('.', $path) ?: '.'
                    ])
                ),
            };

            $path[] = $chunk;
        }

        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function has(string $key): bool
    {
        try {
            $this->get($key);

            return true;
        } catch (\Throwable) {
            return false;
        }
    }
}
