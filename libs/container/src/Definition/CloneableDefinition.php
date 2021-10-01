<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\Definition;

use Helix\Container\Exception\RegistrationException;

final class CloneableDefinition extends Definition
{
    /**
     * @var string
     */
    private const ERROR_NOT_CLONEABLE =
        'Unable to register instance of %s because the object is not cloneable'
    ;

    /**
     * @var \Closure(): object
     */
    private \Closure $resolver;

    /**
     * @param object $instance
     * @throws RegistrationException
     */
    public function __construct(object $instance)
    {
        $this->resolver = match (true) {
            $instance instanceof \Throwable => throw new RegistrationException(
                \sprintf(self::ERROR_NOT_CLONEABLE, \Throwable::class)
            ),

            $instance instanceof \Generator,
            $instance instanceof \Fiber => throw new RegistrationException(
                \sprintf(self::ERROR_NOT_CLONEABLE, $instance::class)
            ),

            default => static fn () => clone $instance,
        };
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(callable|array $resolver = null): object
    {
        return $this->resolver;
    }
}
