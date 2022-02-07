<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Exception;

use Helix\Config\EntryInterface;

/**
 * @psalm-type ValidationMessageType = non-empty-string
 * @psalm-import-type ValidationPathType from ValidationExceptionInterface
 */
class ValidationException extends ConfigException implements ValidationExceptionInterface
{
    /**
     * @var non-empty-string
     */
    public const PATH_DEPTH_DELIMITER = ' > ';

    /**
     * @param ValidationPathType $path
     * @param ValidationMessageType $validationMessage
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        protected readonly string $validationMessage,
        protected readonly array $path = [],
        int $code = 0,
        \Throwable $previous = null
    ) {
        $message = $this->formatExceptionMessage($this->validationMessage, $this->getPath());

        parent::__construct($message, $code, $previous);
    }

    /**
     * {@inheritDoc}
     */
    public function getPath(): array
    {
        return $this->path;
    }

    /**
     * @param non-empty-string $delimiter
     * @return non-empty-string
     */
    public function getPathAsString(string $delimiter = self::PATH_DEPTH_DELIMITER): string
    {
        return $this->formatPath($this->getPath(), $delimiter);
    }

    /**
     * @return ValidationMessageType
     */
    public function getValidationMessage(): string
    {
        return $this->validationMessage;
    }

    /**
     * @param ValidationPathType $path
     * @param non-empty-string $delimiter
     * @return non-empty-string
     */
    protected function formatPath(array $path, string $delimiter = self::PATH_DEPTH_DELIMITER): string
    {
        return \implode($delimiter, $path);
    }

    /**
     * @param ValidationMessageType $validationMessage
     * @param ValidationPathType $path
     * @return non-empty-string
     */
    protected function formatExceptionMessage(string $validationMessage, array $path): string
    {
        $pathString = $this->formatPath($path);

        return \sprintf('%s at %s', $validationMessage, $pathString ? '[' . $pathString . ']' : 'config root');
    }
}
