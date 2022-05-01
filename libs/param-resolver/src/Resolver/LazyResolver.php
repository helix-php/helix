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
use Helix\ParamResolver\Metadata\Type\TerminalTypeInterface;

class LazyResolver extends UnionResolver
{
    /**
     * @param \Closure(ParameterInterface, TerminalTypeInterface): mixed $handler
     */
    public function __construct(
        private readonly \Closure $handler,
    ) {
    }

    /**
     * @param ParameterInterface $param
     * @param TerminalTypeInterface $type
     * @return mixed
     */
    protected function try(ParameterInterface $param, TerminalTypeInterface $type): mixed
    {
        return ($this->handler)($param, $type);
    }
}
