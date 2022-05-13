<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Debug\Command;

use Helix\Contracts\Router\RepositoryInterface;
use Helix\Contracts\Router\RouteInterface;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class DebugRouterCommand extends Command
{
    /**
     * @param RepositoryInterface $routes
     */
    public function __construct(
        private readonly RepositoryInterface $routes,
    ) {
        parent::__construct('debug:router');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $size = $this->getConsoleMaxSize();

        foreach ($this->routes as $route) {
            $prefix = $this->getFormattedRouteMethod($route);
            $prefix .= $this->getFormattedRoutePath($route);

            $suffix = $this->getFormattedRouteHandler($route);

            $line = $size - \mb_strlen(\strip_tags($prefix)) - \mb_strlen(\strip_tags($suffix));
            $delimiter = \sprintf('<fg=gray>%s</> ', \str_repeat('┄', $line - 1));

            $output->writeln($prefix . $delimiter . $suffix);
        }

        return self::SUCCESS;
    }

    /**
     * @param RouteInterface $route
     * @return non-empty-string
     */
    private function getFormattedRouteHandler(RouteInterface $route): string
    {
        $handler = $route->getHandler();

        if (\is_string($handler)) {
            return $handler;
        }

        return \get_debug_type($handler);
    }

    /**
     * @param RouteInterface $route
     * @return non-empty-string
     */
    private function getFormattedRouteMethod(RouteInterface $route): string
    {
        $method = $route->getMethod();
        $color = $method->isIdempotent() ? 'green' : 'red';

        return \sprintf(" <fg=$color>%-8s</> ", $method->getName());
    }

    /**
     * @param RouteInterface $route
     * @return non-empty-string
     */
    private function getFormattedRoutePath(RouteInterface $route): string
    {
        $path = $route->getPath();
        $path = \preg_replace('/\{.+?}/', '<fg=yellow;options=bold>$0</>', $path);

        return \sprintf('<options=bold>%s</> ', $path);
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('Displays a list of registered routes');
    }

    /**
     * @return int
     */
    private function getConsoleMaxSize(): int
    {
        if (\class_exists(Console::class)) {
            return (new Console())->getNumberOfColumns();
        }

        return 80;
    }
}
