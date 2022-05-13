<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Debug\Command;

use Helix\Container\Definition\Definition;
use Helix\Container\Definition\DefinitionInterface;
use Helix\Container\Definition\LazyDefinition;
use Helix\Container\RepositoryInterface;
use Helix\Foundation\Console\Command;

final class DebugContainerCommand extends Command
{
    protected string $name = 'debug:container';
    protected string $description = 'Displays a list of registered services';

    private array $shortNames = [];

    public function invoke(RepositoryInterface $definitions): int
    {
        foreach ($definitions as $name => $definition) {
            $this->item($this->getNameString($name), $this->getDefinitionString($definition));
        }

        return self::SUCCESS;
    }

    /**
     * @param string $name
     * @return string
     */
    private function getNameString(string $name): string
    {
        $prefix = match (true) {
            \interface_exists($name) => '<fg=green>interface</>',
            \class_exists($name) => '    <fg=yellow>class</>',
            default => '   <fg=red>string</>',
        };

        return "$prefix $name";
    }

    /**
     * @param DefinitionInterface $definition
     * @return string
     */
    private function getDefinitionString(DefinitionInterface $definition): string
    {
        $color = $this->getDefinitionTypeColorString($definition);
        $name = $this->getShortName($definition);

        return "<fg=$color>$name</>";
    }

    /**
     * @param DefinitionInterface $definition
     * @return string
     */
    private function getDefinitionTypeColorString(DefinitionInterface $definition): string
    {
        return match (true) {
            $definition instanceof LazyDefinition => 'green',
            $definition instanceof Definition => 'yellow',
            default => 'red',
        };
    }

    /**
     * @param DefinitionInterface $definition
     * @return string
     */
    private function getShortName(DefinitionInterface $definition): string
    {
        if (!isset($this->shortNames[$definition::class])) {
            $shortName = (new \ReflectionObject($definition))
                ->getShortName();

            if (\str_ends_with($shortName, 'Definition')) {
                $shortName = \substr($shortName, 0, -10);
            }

            $this->shortNames[$definition::class] = $shortName;
        }

        return $this->shortNames[$definition::class];
    }
}
