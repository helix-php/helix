<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Reader;

use Helix\Config\Exception\ConfigException;

/**
 * @psalm-import-type ConfigFileExtension from ReadersRepositoryInterface
 * @psalm-type ReadersList = iterable<ConfigFileExtension|array<ConfigFileExtension>, ReaderInterface>
 */
final class Repository implements ReadersRepositoryInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_READER_NOT_FOUND = 'Could not load reader for "%s" configuration';

    /**
     * @var array<ConfigFileExtension, ReaderInterface>
     */
    private array $readers = [];

    /**
     * @param ReadersList $readers
     */
    public function __construct(
        iterable $readers = []
    ) {
        foreach ($readers as $extensions => $reader) {
            foreach ((array)$extensions as $extension) {
                $this->readers[\strtolower($extension)] = $reader;
            }
        }
    }

    /**
     * @param \Closure():ReadersList $callable
     * @return static
     */
    public static function fromCallable(\Closure $callable): self
    {
        return new self($callable());
    }

    /**
     * @param ConfigFileExtension $ext
     * @return ReaderInterface
     * @throws ConfigException
     */
    public function get(string $ext): ReaderInterface
    {
        return $this->readers[\strtolower($ext)] ?? throw new ConfigException(
            \sprintf(self::ERROR_READER_NOT_FOUND, $ext),
        );
    }

    /**
     * @param ConfigFileExtension $ext
     * @return ReaderInterface|null
     */
    public function find(string $ext): ?ReaderInterface
    {
        return $this->readers[\strtolower($ext)] ?? null;
    }

    /**
     * @param ConfigFileExtension $ext
     * @return bool
     */
    public function has(string $ext): bool
    {
        return isset($this->readers[\strtolower($ext)]);
    }

    /**
     * @param ConfigFileExtension $ext
     * @param ReaderInterface $reader
     * @return void
     */
    public function add(string $ext, ReaderInterface $reader): void
    {
        $this->readers[\strtolower($ext)] = $reader;
    }

    /**
     * @param ConfigFileExtension $ext
     * @param ReaderInterface $reader
     * @return $this
     */
    public function with(string $ext, ReaderInterface $reader): self
    {
        $self = clone $this;
        $self->readers[\strtolower($ext)] = $reader;

        return $self;
    }
}
