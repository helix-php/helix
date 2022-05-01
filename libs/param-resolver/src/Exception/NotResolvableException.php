<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Exception;

use Helix\ParamResolver\Metadata\ParameterInterface;

class NotResolvableException extends ParamResolverException
{
    /**
     * @param ParameterInterface $parameter
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        private readonly ParameterInterface $parameter,
        string $message,
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ParameterInterface
     */
    public function getParameter(): ParameterInterface
    {
        return $this->parameter;
    }
}
