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
use Helix\Container\Definition\LazyDefinition;
use Helix\Contracts\Container\DefinitionInterface;
use Helix\Contracts\Container\RepositoryInterface;
use Helix\Foundation\Console\Command;

final class DebugContainerCommand extends Command
{
    /**
     * @var non-empty-string
     */
    protected string $name = 'debug:container';

    /**
     * @var string
     */
    protected string $description = 'Displays a list of registered services';

    /**
     * @var array<non-empty-string, non-empty-string>
     */
    private array $definitionShortNames = [];

    /**
     * @param RepositoryInterface $definitions
     * @return int
     */
    public function invoke(RepositoryInterface $definitions): int
    {
        foreach ($this->getOrderedDefinitions($definitions) as $name => $definition) {
            $this->item($this->getNameString($name), $this->getDefinitionString($definition));
        }

        return self::SUCCESS;
    }

    /**
     * @param RepositoryInterface $definitions
     * @return array<non-empty-string, DefinitionInterface>
     */
    private function getOrderedDefinitions(RepositoryInterface $definitions): array
    {
        $result = \iterator_to_array($definitions);

        \ksort($result, \SORT_NATURAL);

        return $result;
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
        if (!isset($this->definitionShortNames[$definition::class])) {
            $shortName = (new \ReflectionObject($definition))
                ->getShortName();

            if (\str_ends_with($shortName, 'Definition')) {
                $shortName = \substr($shortName, 0, -10);
            }

            $this->definitionShortNames[$definition::class] = $shortName;
        }

        return $this->definitionShortNames[$definition::class];
    }
}
