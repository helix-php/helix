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
use Helix\ParamResolver\Metadata\Type\UnionType;

abstract class UnionResolver implements ResolverInterface
{
    /**
     * @param ParameterInterface $param
     * @param TerminalTypeInterface $type
     * @return mixed
     */
    abstract protected function try(ParameterInterface $param, TerminalTypeInterface $type): mixed;

    /**
     * @param ParameterInterface $param
     * @param UnionType $union
     * @return mixed
     */
    private function union(ParameterInterface $param, UnionType $union): mixed
    {
        foreach ($union->getTypes() as $type) {
            if (!$type instanceof TerminalTypeInterface) {
                return null;
            }

            if (($result = $this->try($param, $type)) !== null) {
                return $result;
            }
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(ParameterInterface $parameter): mixed
    {
        $type = $parameter->getType();

        return match (true) {
            $type instanceof TerminalTypeInterface => $this->try($parameter, $type),
            $type instanceof UnionType => $this->union($parameter, $type),
            default => null,
        };
    }
}
