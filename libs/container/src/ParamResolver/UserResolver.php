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
 * @internal UserResolver is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Container
 */
final class UserResolver
{
    /**
     * @param callable|array|null $resolver
     * @return callable|null
     */
    public function toCallableOrNull(callable|array|null $resolver): ?callable
    {
        if ($resolver === null) {
            return null;
        }

        return $this->toCallable($resolver);
    }

    /**
     * @param callable|array|null $resolver
     * @return callable
     */
    public function toCallable(callable|array|null $resolver): callable
    {
        return match (true) {
            $resolver === null => static fn () => null,
            \is_callable($resolver) => $resolver,
            default => $this->fromArray($resolver),
        };
    }

    /**
     * <code>
     *  [
     *      '$name'     => '...', // Resolving from parameter name
     *      'TypeName'  => '...', // Resolving by instance of type
     *  ]
     * </code>
     *
     * @param array $arguments
     * @return callable
     */
    private function fromArray(array $arguments): callable
    {
        return static function (\ReflectionNamedType $type, string $name) use ($arguments) {
            foreach ($arguments as $argument => $value) {
                if (! \is_string($argument)) {
                    continue;
                }

                $isFound = $argument === "$$name" || (
                    ! $type->isBuiltin()
                    && $type->getName() instanceof $argument
                );

                if ($isFound) {
                    return $value;
                }
            }

            return null;
        };
    }
}
