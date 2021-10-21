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

abstract class Reader implements ReaderInterface
{
    /**
     * @param string $pathname
     * @param \Throwable|null $e
     * @return ConfigException
     */
    protected function readError(string $pathname, \Throwable $e = null): ConfigException
    {
        $message = \sprintf('An error occurred while reading [%s] config file', $pathname);

        return new ConfigException($message, (int)($e?->getCode() ?? 0), $e);
    }
}
