<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\Exception;

class ParamNotResolvableException extends ParamResolverException
{
    /**
     * @param \ReflectionParameter $parameter
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        private readonly \ReflectionParameter $parameter,
        string $message,
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return \ReflectionParameter
     */
    public function getParameter(): \ReflectionParameter
    {
        return $this->parameter;
    }
}
