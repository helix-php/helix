<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\Definition;

use Helix\Container\Container;
use Helix\Container\Exception\RecursiveDeclarationException;

abstract class LazyDefinition extends Definition
{
    /**
     * @var string
     */
    private const ERROR_RECURSIVE_RESOLUTION =
        'The %s cannot be initialized because found a circular dependency ' .
        'while lazy initialization defined in %s';

    /**
     * @var \Closure(callable|array|null): object
     */
    protected \Closure $declarator;

    /**
     * @var bool
     */
    private bool $resolving = false;

    /**
     * @var \Closure
     */
    private \Closure $info;

    /**
     * @param string $id
     * @param Container $container
     * @param callable $declarator
     */
    public function __construct(private string $id, Container $container, callable $declarator)
    {
        $this->declarator = static fn (callable|array $resolver = null) => $container->call($declarator, $resolver);

        $this->info = static function () use ($declarator) {
            $reflection = new \ReflectionFunction($declarator);

            return $reflection->getFileName() . ':' . $reflection->getStartLine();
        };
        $this->id = $id;
    }

    /**
     * @return void
     * @throws RecursiveDeclarationException
     */
    protected function resolving(): void
    {
        if ($this->resolving === true) {
            $message = \sprintf(self::ERROR_RECURSIVE_RESOLUTION, $this->id, ($this->info)());
            throw new RecursiveDeclarationException($message);
        }

        $this->resolving = true;
    }

    /**
     * @return void
     */
    protected function resolved(): void
    {
        $this->resolving = false;
    }
}
