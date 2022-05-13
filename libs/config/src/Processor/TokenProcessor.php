<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Processor;

class TokenProcessor implements ProcessorInterface
{
    /**
     * @var array<non-empty-string>
     */
    protected array $keys = [];

    /**
     * @var array<string|int>
     */
    protected array $values = [];

    /**
     * @param iterable<non-empty-string, string|int> $variables
     * @param string $prefix
     * @param string $suffix
     */
    public function __construct(
        iterable $variables,
        private readonly string $prefix,
        private readonly string $suffix,
    ) {
        foreach ($variables as $key => $val) {
            if (\is_string($val) || \is_int($val)) {
                $this->add($key, $val);
            }
        }
    }

    /**
     * @param non-empty-string $key
     * @param string|int $value
     * @return void
     */
    public function add(string $key, string|int $value): void
    {
        $this->keys[] = $this->prefix . $key . $this->suffix;
        $this->values[] = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function process(string $value, int|string $key): string
    {
        return \str_replace($this->keys, $this->values, $value);
    }

    /**
     * @return array{variables: array<string>}
     */
    public function __debugInfo(): array
    {
        return ['variables' => $this->keys];
    }
}
