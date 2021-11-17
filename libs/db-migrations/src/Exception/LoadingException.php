<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Migrations\Exception;

class LoadingException extends MigrationException
{
    /**
     * @var string
     */
    final public const ERROR_CLASS_LOADING = 'Could not load migration from "%s": %s';

    /**
     * @param string $pathname
     * @param \Throwable|null $general
     * @return static
     */
    public static function fromPathname(string $pathname, ?\Throwable $general = null): self
    {
        $message = \sprintf(self::ERROR_CLASS_LOADING, $pathname, $general?->getMessage() ?? 'Unknown PHP Exception');

        return new self($message, (int)($general?->getCode() ?? 0), $general);
    }
}
