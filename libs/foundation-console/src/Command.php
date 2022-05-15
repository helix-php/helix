<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Console;

use Helix\Contracts\Container\DispatcherInterface;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method void invoke(mixed ...$args)
 */
abstract class Command extends SymfonyCommand
{
    /**
     * @var positive-int
     */
    protected const DEFAULT_CONSOLE_SIZE = 80;

    /**
     * @var InputInterface
     */
    protected readonly InputInterface $input;

    /**
     * @var OutputInterface
     */
    protected readonly OutputInterface $output;

    /**
     * @var non-empty-string
     */
    protected string $name = '';

    /**
     * @var non-empty-string
     */
    protected string $description = '';

    /**
     * @param DispatcherInterface $dispatcher
     */
    public function __construct(
        private readonly DispatcherInterface $dispatcher,
    ) {
        parent::__construct();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->input = $input;
        $this->output = $output;

        if (!\method_exists($this, 'invoke')) {
            throw new \BadFunctionCallException('You must define the invoke() method in the concrete command class.');
        }

        $this->dispatcher->call($this->invoke(...));

        return self::SUCCESS;
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setName($this->name);
        $this->setDescription($this->description);
    }

    /**
     * @return positive-int
     */
    protected function getConsoleWidth(): int
    {
        if (\class_exists(Console::class)) {
            return (new Console())->getNumberOfColumns();
        }

        return static::DEFAULT_CONSOLE_SIZE;
    }

    /**
     * @param array<non-empty-string> $messages
     * @param string $char
     * @return void
     */
    protected function separator(array $messages = [], string $char = '─'): void
    {
        $this->output->writeln($this->getLineSeparatorString($messages, $char));
    }

    /**
     * @param string $prefix
     * @param string $suffix
     * @param non-empty-string $char
     * @return void
     */
    protected function item(string $prefix = '', string $suffix = '', string $char = '┄'): void
    {
        [$prefix, $suffix] = [\rtrim($prefix) . ' ', ' ' . \ltrim($suffix)];

        $separator = $this->getLineSeparatorString([$prefix, $suffix], $char);

        $this->output->writeln($prefix . $separator . $suffix);
    }

    /**
     * @param int $current
     * @param int $max
     * @return string
     */
    protected function getChildItemPrefixString(int $current, int $max): string
    {
        $type = $max <= $current ? '└' : '├';

        return " <fg=gray>{$type}┄</>";
    }

    /**
     * @param int $current
     * @param int $max
     * @param string $message
     * @return void
     */
    protected function child(int $current, int $max, string $message = ''): void
    {
        $prefix = $this->getChildItemPrefixString($current, $max);

        $this->output->writeln("{$prefix} {$message}");
    }

    /**
     * @param array<non-empty-string> $messages
     * @param non-empty-string $char
     * @return non-empty-string
     */
    protected function getLineSeparatorString(array $messages = [], string $char = '┄'): string
    {
        $size = $full = $this->getConsoleWidth();

        foreach ($messages as $message) {
            $size -= \mb_strlen(\strip_tags($message));
        }

        if ($size < 0) {
            $size = $full;
        }

        return \sprintf('<fg=gray>%s</>', \str_repeat($char, $size));
    }
}
