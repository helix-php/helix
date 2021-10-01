<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Console\Command;

use Helix\Boot\ExtensionInterface;
use Helix\Config\Attribute\ProvidesConfig;
use Helix\Boot\RepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class ExtPublishCommand extends Command
{
    /**
     * @param string $path
     * @param RepositoryInterface $repository
     */
    public function __construct(
        private readonly string $path,
        private readonly RepositoryInterface $repository,
    ) {
        parent::__construct('ext:publish');
    }

    /**
     * @param string $class
     * @param ExtensionInterface $ext
     * @return string
     * @psalm-suppress UnusedParam
     */
    private function render(string $class, ExtensionInterface $ext): string
    {
        \ob_start();
        require __DIR__ . '/../../resources/stubs/config-publish.stub.php';
        return (string)\ob_get_clean();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        foreach ($this->repository->getExtensions() as $ext) {
            $output->writeln(\sprintf(' - Loading <info>%s</info> extension', $ext->getName()));

            foreach ($ext->getClassMetadata(ProvidesConfig::class) as $meta) {
                $pathname = $this->path . '/' . $meta->name . '.php';

                if (\is_file($pathname)) {
                    $output->writeln(
                        \sprintf('   <fg=gray>↳ Config "<comment>%s</comment>" is present</>', $meta->name)
                    );
                    continue;
                }

                $output->write(\sprintf('   ↳ Publish "<comment>%s</comment>" config file', $meta->name));

                $status = @\file_put_contents($pathname, $this->render($meta->class, $ext));

                if ($status === false) {
                    $output->writeln(' [<error>FAIL</error>]');
                } else {
                    $output->writeln(' [<fg=green>OK</>]');
                }
            }
        }

        return self::SUCCESS;
    }
}
