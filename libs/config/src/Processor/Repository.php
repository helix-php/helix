<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Processor;

final class Repository implements MutableProcessorsRepositoryInterface
{
    /**
     * @var array<ProcessorInterface>
     */
    private array $processors = [];

    /**
     * @param iterable<ProcessorInterface> $processors
     */
    public function __construct(
        iterable $processors = []
    ) {
        $this->processors = [...$processors];
    }

    /**
     * @param \Closure():iterable<ProcessorInterface> $callable
     * @return self
     */
    public static function fromCallable(\Closure $callable): self
    {
        return new self($callable());
    }

    /**
     * {@inheritDoc}
     */
    public function processAll(array $config): array
    {
        foreach ($config as $key => $value) {
            $config[$key] = match (true) {
                \is_string($value) => $this->process($value, $key),
                \is_array($value) => $this->processAll($value),
                default => $value,
            };
        }

        return $config;
    }

    /**
     * {@inheritDoc}
     */
    public function process(string $value, int|string $key): string
    {
        foreach ($this->processors as $processor) {
            $value = $processor->process($value, $key);
        }

        return $value;
    }

    /**
     * {@inheritDoc}
     */
    public function add(ProcessorInterface $processor): void
    {
        $this->processors[] = $processor;
    }

    /**
     * @param ProcessorInterface $processor
     * @return $this
     */
    public function with(ProcessorInterface $processor): self
    {
        $self = clone $this;
        $self->processors[] = $processor;

        return $self;
    }
}
