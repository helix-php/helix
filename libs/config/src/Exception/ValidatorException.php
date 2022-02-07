<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Exception;

class ValidatorException extends ConfigException
{
    /**
     * @param list<ValidationExceptionInterface> $exceptions
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(iterable $exceptions, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($this->formatExceptionMessage($exceptions), $code, $previous);
    }

    /**
     * @param list<ValidationExceptionInterface> $exceptions
     * @return non-empty-string
     */
    private function formatExceptionMessage(iterable $exceptions): string
    {
        $messages = [];

        /** @var ValidationExceptionInterface $exception */
        foreach ($exceptions as $exception) {
            $pathString = $exception->getPathAsString();

            $messages[] = \vsprintf('  - %s at %s', [
                \ucfirst($exception->getValidationMessage()),
                $pathString ? '[' . $pathString . ']' : 'config root',
            ]);
        }

        return \vsprintf('An error occurred while validating config section: %s', [
            "\n" . \implode("\n", $messages)
        ]);
    }
}
