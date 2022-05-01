<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\ParamResolver;

/**
 * @internal Renderer is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Container
 */
final class Renderer
{
    /**
     * @param \ReflectionParameter $param
     * @param array<\ReflectionNamedType> $types
     * @return string
     */
    public static function parameterToString(\ReflectionParameter $param, array $types = []): string
    {
        // Parameter names
        $map = static fn (\ReflectionNamedType $type): string => $type->getName();

        try {
            $default = $param->getDefaultValue();

            $default = \is_scalar($default)
                ? (string)$default
                : \var_export($default)
            ;
        } catch (\ReflectionException) {
            $default = '<unknown>';
        }

        return \vsprintf('%s%s %s%s$%s%s', [
            // Is promoted?
            $param->isPromoted() ? '[promoted] ' : '',
            // Type hint
            \implode('|', \array_map($map, $types)),
            // Variadic?
            $param->isVariadic() ? '...' : '',
            // Passed by reference?
            $param->canBePassedByValue() ? '' : '&',
            // Name
            $param->getName(),
            // Default value
            ($param->isDefaultValueAvailable() ? ' = ' . $default : ''),
        ]);
    }

    /**
     * @param \ReflectionClass $class
     * @return non-empty-string
     */
    private static function getClassName(\ReflectionClass $class): string
    {
        if ($class->isAnonymous()) {
            return 'class@anonymous';
        }

        return $class->getName();
    }

    /**
     * @param \ReflectionFunctionAbstract $fun
     * @return string
     */
    public static function functionToString(\ReflectionFunctionAbstract $fun): string
    {
        if (! $fun->isUserDefined()) {
            return \vsprintf('builtin function [%s] defined in [ext-%s]', [
                $fun->getName(),
                $fun->getExtensionName(),
            ]);
        }

        if ($fun->isClosure()) {
            return \vsprintf('anonymous function defined in [%s:%d]', [
                $fun->getFileName(),
                $fun->getStartLine(),
            ]);
        }

        if ($fun instanceof \ReflectionMethod) {
            return \vsprintf('function [%s::%s()] defined in [%s:%d]', [
                self::getClassName($fun->getDeclaringClass()),
                $fun->getName(),
                $fun->getFileName(),
                $fun->getStartLine(),
            ]);
        }

        return \vsprintf('function [%s()] defined in [%s:%d]', [
            $fun->getName(),
            $fun->getFileName(),
            $fun->getStartLine(),
        ]);
    }
}
