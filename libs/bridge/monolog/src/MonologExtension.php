<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Monolog;

use Helix\Boot\Attribute\Singleton;
use Helix\Foundation\Application;
use Helix\Foundation\Path;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\FormattableHandlerInterface;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

final class MonologExtension
{
    #[Singleton(as: Logger::class)]
    public function getLogger(Path $path, Application $app): LoggerInterface
    {
        $name = (new \DateTime())->format('Y-m-d');

        return $this->createLogger($app->env, [
            new StreamHandler($path->storage('logs', 'helix.' . $name . '.log')),
        ]);
    }

    /**
     * @param string $name
     * @param array<HandlerInterface> $handlers
     * @return LoggerInterface
     */
    private function createLogger(string $name, array $handlers): LoggerInterface
    {
        foreach ($handlers as $handler) {
            $this->updateHandler($handler);
        }

        return new Logger($name, $handlers);
    }

    /**
     * @param HandlerInterface $handler
     * @return void
     */
    private function updateHandler(HandlerInterface $handler): void
    {
        if ($handler instanceof FormattableHandlerInterface) {
            $this->updateFormattableHandler($handler);
        }
    }

    /**
     * @param FormattableHandlerInterface $handler
     * @return void
     */
    private function updateFormattableHandler(FormattableHandlerInterface $handler): void
    {
        $formatter = $handler->getFormatter();

        if ($formatter instanceof LineFormatter) {
            $formatter->allowInlineLineBreaks();
        }
    }
}
