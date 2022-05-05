<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\ParamResolver;

class NamedArgumentsResolver extends ValueResolver
{
    /**
     * @param array<non-empty-string, mixed> $arguments
     */
    public function __construct(
        private readonly array $arguments,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function supports(\ReflectionParameter $parameter): bool
    {
        $type = $parameter->getType();

        return isset($this->arguments[$parameter->getName()]) && $type?->isBuiltin() !== false;
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(\ReflectionParameter $parameter): mixed
    {
        return $this->arguments[$parameter->getName()];
    }
}
