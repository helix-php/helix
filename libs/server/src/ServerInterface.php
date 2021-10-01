<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server;

use Helix\Contracts\ErrorHandler\Http\HttpErrorHandlerInterface;
use Psr\Http\Server\RequestHandlerInterface;

interface ServerInterface
{
    /**
     * @param RequestHandlerInterface $handler
     * @param HttpErrorHandlerInterface|null $error
     * @return void
     * @throws \Throwable
     */
    public function run(RequestHandlerInterface $handler, HttpErrorHandlerInterface $error = null): void;
}
