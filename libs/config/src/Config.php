<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config;

use Helix\Config\Exception\ConfigException;
use Helix\Config\Exception\NotLoadableException;
use Helix\Config\Processor\Repository as ProcessorsRepository;
use Helix\Config\Reader\Repository as ReadersRepository;
use Helix\Contracts\Arrayable\ArrayableInterface;

final class Config implements ConfigInterface, RegistrarInterface, ArrayableInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_NOT_FOUND = 'Configuration "%s" not found';

    /**
     * @var array<non-empty-string, array>
     */
    private array $config = [];

    /**
     * @var array<non-empty-string>
     */
    private array $directories = [];

    /**
     * @param non-empty-string|array<non-empty-string> $directories
     * @param ReadersRepository $readers
     * @param ProcessorsRepository $processors
     */
    public function __construct(
        array|string $directories = [],
        public readonly ReadersRepository $readers = new ReadersRepository(),
        public readonly ProcessorsRepository $processors = new ProcessorsRepository(),
    ) {
        $this->directories = (array)$directories;
    }

    /**
     * {@inheritDoc}
     */
    public function addFile(string $pathname): void
    {
        if (\is_file($pathname)) {
            $this->loadFile($pathname);
            return;
        }

        foreach ($this->directories as $directory) {
            if (\is_file($directory . '/' . $pathname)) {
                $this->loadFile($directory . '/' . $pathname);
                return;
            }
        }

        throw new NotLoadableException(\sprintf(self::ERROR_NOT_FOUND, $pathname));
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $section, array $default = []): array
    {
        return (array)($this->config[$section] ?? $default);
    }

    /**
     * {@inheritDoc}
     * @psalm-suppress MixedPropertyTypeCoercion
     */
    public function add(array $data): void
    {
        $this->config = \array_merge_recursive(
            $this->config,
            $this->processors->processAll($data),
        );
    }

    /**
     * @psalm-taint-sink file $pathname
     * @param non-empty-string $pathname
     * @return void
     * @throws ConfigException
     */
    private function loadFile(string $pathname): void
    {
        /** @var non-empty-string $extension */
        $extension = \pathinfo($pathname, \PATHINFO_EXTENSION);

        $data = $this->readers->get($extension)
            ->fromFile($pathname);

        $this->add($data);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return $this->config;
    }
}
