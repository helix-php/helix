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
use Helix\Foundation\Console\Command;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Output\OutputInterface;

final class DebugExtensionsCommand extends Command
{
    protected string $name = 'debug:extensions';
    protected string $description = 'Displays a list of registered extensions';

    /**
     * @param RepositoryInterface $extensions
     * @return int
     * @throws \ReflectionException
     */
    public function invoke(RepositoryInterface $extensions): int
    {
        foreach ($extensions->getExtensions() as $i => $extension) {
            $context = $extension->getContext();
            $extensionShortClassName = (new \ReflectionObject($context))->getShortName();

            if ($i !== 0) {
                $this->separator();
            }

            $this->output->writeln('');

            $this->item($this->getExtNameString($extension), $this->getExtVersionString($extension));
            if ($description = $this->getExtDescriptionString($extension)) {
                $this->output->writeln($description);
            }

            $count = \iterator_count($extension->getMethodMetadata());
            $current = 0;

            /** @var \ReflectionMethod $method */
            foreach ($extension->getMethodMetadata() as $method => $meta) {
                $metadataShortClassName = (new \ReflectionClass($meta))->getShortName();

                $color = $meta instanceof Execution ? 'blue' : 'yellow';
                $type = $this->getChildItemPrefixString(++$current, $count);

                $prefix = "{$type} <fg=$color>#[$metadataShortClassName]</>";
                $suffix = \sprintf('%s::%s()', $extensionShortClassName, $method->getName());

                $this->item($prefix, $suffix, ' ');
            }

            $this->output->writeln('');
        }

        return self::SUCCESS;
    }

    /**
     * @param ExtensionInterface $ext
     * @return non-empty-string
     */
    private function getExtVersionString(ExtensionInterface $ext): string
    {
        return '<comment>' . $ext->getVersion() . '</comment>';
    }

    /**
     * @param ExtensionInterface $ext
     * @return string
     */
    private function getExtDescriptionString(ExtensionInterface $ext): string
    {
        return $ext->getDescription();
    }

    /**
     * @param ExtensionInterface $ext
     * @return string
     */
    private function getExtNameString(ExtensionInterface $ext): string
    {
        return \sprintf('<fg=green>%s</>', $ext->getName());
    }
}
