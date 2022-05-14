<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Extension;

use Helix\Boot\Attribute\Singleton;
use Helix\Foundation\Path;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

final class LoggerExtension
{
    #[Singleton(as: Logger::class)]
    public function getLogger(Path $path): LoggerInterface
    {
        $handler = new StreamHandler($path->storage('helix.log'));

        $formatter = $handler->getFormatter();
        if ($formatter instanceof LineFormatter) {
            $formatter->allowInlineLineBreaks();
        }

        return new Logger('Application', [$handler]);
    }
}
