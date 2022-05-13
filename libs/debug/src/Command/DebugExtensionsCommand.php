<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Debug\Command;

use Helix\Boot\Attribute\Execution;
use Helix\Boot\ExtensionInterface;
use Helix\Boot\RepositoryInterface;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class DebugExtensionsCommand extends Command
{
    /**
     * @param RepositoryInterface $repository
     */
    public function __construct(
        private readonly RepositoryInterface $repository,
    ) {
        parent::__construct('debug:extensions');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \ReflectionException
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $size = $this->getConsoleMaxSize();

        foreach ($this->repository->getExtensions() as $extension) {
            $context = $extension->getContext();
            $reflection = new \ReflectionObject($context);

            $extensionClassName = $reflection->getName();
            $extensionFileName = $reflection->getFileName();
            $extensionShortClassName = $reflection->getShortName();

            $this->separator($output, $size);

            $output->writeln('');
            $output->writeln(' ' . $this->getExtName($extension));
            if ($description = $this->getExtDescription($extension)) {
                $output->writeln(' ' . $description);
            }

            $output->writeln('');

            $output->writeln(\vsprintf(' <href=%s>%s</> (%s)', [
                $extensionFileName,
                $extensionClassName,
                $this->getVersion($extension),
            ]));

            $output->writeln('');

            /** @var \ReflectionMethod $method */
            foreach ($extension->getMethodMetadata() as $method => $meta) {
                $metadataShortClassName = (new \ReflectionClass($meta))->getShortName();

                $color = $meta instanceof Execution ? 'blue' : 'yellow';

                $output->writeln(\vsprintf(' <fg=%s>#[%s]</>: %s::%s()', [
                    $color,
                    $metadataShortClassName,
                    $extensionShortClassName,
                    $method->getName(),
                ]));
            }

            $output->writeln('');
        }

        return self::SUCCESS;
    }

    /**
     * @param OutputInterface $out
     * @param int $size
     * @return void
     */
    private function separator(OutputInterface $out, int $size): void
    {
        $out->writeln('<fg=gray>' . \str_repeat('┄', $size) . '</>');
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

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('Displays a list of registered extensions');
    }

    /**
     * @param ExtensionInterface $ext
     * @return non-empty-string
     */
    private function getVersion(ExtensionInterface $ext): string
    {
        return '<comment>' . $ext->getVersion() . '</comment>';
    }

    /**
     * @param ExtensionInterface $ext
     * @return string
     */
    private function getExtDescription(ExtensionInterface $ext): string
    {
        $description = $ext->getDescription();

        if ($description !== '' && !\str_ends_with($description, '.')) {
            $description .= '.';
        }

        return $description;
    }

    /**
     * @param ExtensionInterface $ext
     * @return string
     */
    private function getExtName(ExtensionInterface $ext): string
    {
        return \sprintf('<fg=green>%s</>', $ext->getName());
    }
}
