<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata;

use Helix\ParamResolver\Metadata\Type\CompositeTypeInterface;
use Helix\ParamResolver\Metadata\Type\IntersectionType;
use Helix\ParamResolver\Metadata\Type\TerminalTypeInterface;
use Helix\ParamResolver\Metadata\Type\TypeInterface;
use Helix\ParamResolver\Metadata\Type\UnionType;

final class Printer
{
    /**
     * @var non-empty-string
     */
    private const ERROR_NOT_PRINTABLE = 'Cannot print unknown %s';

    /**
     * @param TypeInterface $type
     * @return non-empty-string
     */
    public function type(TypeInterface $type): string
    {
        return match (true) {
            $type instanceof TerminalTypeInterface => $this->terminalType($type),
            $type instanceof CompositeTypeInterface => $this->compositeType($type),
            default => throw new \InvalidArgumentException(
                \sprintf(self::ERROR_NOT_PRINTABLE, 'type ' . $type::class)
            ),
        };
    }

    /**
     * @param ParameterInterface $parameter
     * @return non-empty-string
     */
    public function parameter(ParameterInterface $parameter): string
    {
        $result = $this->type($parameter->getType()) . ' ';

        if ($parameter->isVariadic()) {
            $result .= '...';
        }

        $result .= '$' . $parameter->getName();

        if ($parameter->hasDefaultValue()) {
            $default = $parameter->getDefaultValue();

            $result .= ' = ';
            $result .= \is_scalar($default)
                ? \var_export($default, true)
                : \get_debug_type($default)
            ;
        }

        return $result;
    }

    /**
     * @param CompositeTypeInterface $type
     * @return non-empty-string
     */
    public function compositeType(CompositeTypeInterface $type): string
    {
        return match (true) {
            $type instanceof UnionType => $this->unionType($type),
            $type instanceof IntersectionType => $this->intersectionType($type),
            default => throw new \InvalidArgumentException(
                \sprintf(self::ERROR_NOT_PRINTABLE, 'composite type ' . $type::class)
            ),
        };
    }

    /**
     * @param CompositeTypeInterface $type
     * @param non-empty-string $join
     * @return non-empty-string
     */
    private function compositeTypeAs(CompositeTypeInterface $type, string $join): string
    {
        $result = [];

        /** @var TypeInterface $child */
        foreach ($type as $child) {
            $result[] = $child instanceof TerminalTypeInterface
                ? $this->terminalType($child)
                : '(' . $this->type($child) . ')'
            ;
        }

        return \implode($join, $result);
    }

    /**
     * @param IntersectionType $type
     * @return non-empty-string
     */
    public function intersectionType(IntersectionType $type): string
    {
        return $this->compositeTypeAs($type, '&');
    }

    /**
     * @param UnionType $type
     * @return non-empty-string
     */
    public function unionType(UnionType $type): string
    {
        return $this->compositeTypeAs($type, '|');
    }

    /**
     * @param TerminalTypeInterface $type
     * @return non-empty-string
     */
    public function terminalType(TerminalTypeInterface $type): string
    {
        if ($type->isInternal()) {
            return $type->getName();
        }

        return '\\' . $type->getName();
    }
}
