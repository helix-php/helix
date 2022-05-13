<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\Connection;

/**
 * @template TConnection of object
 * @template-implements InstantiatorInterface<TConnection>
 */
class ClosureInstantiator implements InstantiatorInterface
{
    /**
     * @param \Closure(TConnection|null):TConnection $instantiator
     */
    public function __construct(
        private readonly \Closure $instantiator,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function create(?object $previous): object
    {
        return ($this->instantiator)($previous);
    }
}
