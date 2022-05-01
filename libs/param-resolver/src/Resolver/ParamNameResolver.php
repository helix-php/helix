<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Resolver;

use Helix\ParamResolver\Metadata\ParameterInterface;

class ParamNameResolver implements CheckingResolverInterface
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
    public function supports(ParameterInterface $parameter): bool
    {
        return \array_key_exists($parameter->getName(), $this->arguments);
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(ParameterInterface $parameter): mixed
    {
        return $this->arguments[$parameter->getName()];
    }
}
