<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View;

use Helix\Contracts\View\FactoryInterface;
use Helix\Contracts\View\ViewInterface;
use Helix\View\Engine\EngineInterface;
use Helix\View\Exception\EngineNotFoundException;

class Factory implements FactoryInterface, RegistrarInterface
{
    use VariablesAwareTrait;

    /**
     * @var array<non-empty-string, EngineInterface>
     */
    protected array $engines = [];

    /**
     * @param iterable<non-empty-string|non-empty-list<non-empty-string>, EngineInterface> $engines
     */
    public function __construct(iterable $engines = [])
    {
        foreach ($engines as $ext => $engine) {
            $this->register($ext, $engine);
        }
    }

    /**
     * @param non-empty-string|non-empty-list<non-empty-string> $ext
     * @param EngineInterface $engine
     */
    public function register(string|iterable $ext, EngineInterface $engine): void
    {
        foreach ($this->getExtensionsArray($ext) as $extension) {
            $this->engines[\strtolower($extension)] = $engine;
        }
    }

    /**
     * @param non-empty-string|non-empty-list<non-empty-string> $ext
     * @return non-empty-array<non-empty-string>
     */
    private function getExtensionsArray(string|iterable $ext): array
    {
        return match (true) {
            \is_string($ext) => [$ext],
            $ext instanceof \Traversable => \iterator_to_array($ext, false),
            default => $ext,
        };
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $name, iterable $vars = []): ViewInterface
    {
        $lower = \strtolower($name);

        foreach ($this->engines as $extension => $engine) {
            if (\str_ends_with($lower, '.' . $extension)) {
                return $engine->create($name, $this->getVariables($vars));
            }
        }

        throw EngineNotFoundException::create($name);
    }
}
