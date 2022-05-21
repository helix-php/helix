<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Mime;

use Helix\Contracts\Mime\TypeInterface;
use Helix\Mime\Exception\DetectionException;

final class NativeParser extends Parser
{
    /**
     * @var non-empty-string
     */
    private const ERROR_FILE_NOT_FOUND = 'Unable to read file "%s" to determine MIME type';

    /**
     * @var non-empty-string
     */
    private const ERROR_INTERNAL_ERROR = 'An internal MIME type definition error occurred';

    /**
     * @var non-empty-string
     */
    private const ERROR_INVALID_ERROR_STREAM = 'Content argument must be a valid '
        . 'resource stream, but %s is given';

    public function __construct()
    {
        if (!\extension_loaded('fileinfo')) {
            throw new \LogicException('The "ext-fileinfo" extension required');
        }
    }

    /**
     * {@inheritDoc}
     * @throws DetectionException
     */
    public function fromPathname(string $pathname): TypeInterface
    {
        if (!\is_readable($pathname)) {
            throw new DetectionException(\sprintf(self::ERROR_FILE_NOT_FOUND, $pathname));
        }

        return Type::parse($this->detect($pathname));
    }

    /**
     * {@inheritDoc}
     * @throws DetectionException
     */
    public function fromResourceStream(mixed $stream): TypeInterface
    {
        if (!\is_resource($stream)) {
            throw new \InvalidArgumentException(
                \sprintf(self::ERROR_INVALID_ERROR_STREAM, \get_debug_type($stream))
            );
        }

        return Type::parse($this->detect($stream));
    }

    /**
     * @param mixed $file
     * @return non-empty-string
     * @throws DetectionException
     */
    private function detect(mixed $file): string
    {
        \error_clear_last();

        $result = @\mime_content_type($file);

        if (!\is_string($result)) {
            $error = \error_get_last()['message'] ?? self::ERROR_INTERNAL_ERROR;

            throw new DetectionException($error);
        }

        return $result;
    }
}
