<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Mime\Script;

abstract class Script
{
    protected static function requireAutoloader(): object
    {
        $directory = __DIR__;

        while ($directory !== \dirname($directory)) {
            $vendor = $directory . '/vendor/autoload.php';

            if (\is_file($vendor)) {
                return require $vendor;
            }

            $directory = \dirname($directory);
        }

        throw new \RuntimeException('Could not load Composer ClassLoader');
    }
}
