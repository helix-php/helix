<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container\Exception;

use Psr\Container\NotFoundExceptionInterface;

class ServiceNotFoundException extends ServiceNotResolvableException implements NotFoundExceptionInterface
{
    /**
     * @param non-empty-string $service
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        private readonly string $service,
        string $message,
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return non-empty-string
     */
    public function getServiceId(): string
    {
        return $this->service;
    }
}
