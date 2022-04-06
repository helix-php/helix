<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Debug\Command;

use Helix\Boot\ExtensionInterface;
use Helix\Boot\RepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

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
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('List loaded extensions');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $rows = [];
        foreach ($this->repository->getExtensions() as $ext) {
            $rows[] = [
                $this->getExtName($ext),
                $ext->getVersion(),
                $ext->getDescription(),
            ];
        }

        (new SymfonyStyle($input, $output))
            ->table(['Name', 'Version', 'Description'], $rows)
        ;

        return self::SUCCESS;
    }

    /**
     * @param ExtensionInterface $ext
     * @return string
     */
    private function getExtName(ExtensionInterface $ext): string
    {
        return \sprintf('%s', $ext->getName());
    }
}
