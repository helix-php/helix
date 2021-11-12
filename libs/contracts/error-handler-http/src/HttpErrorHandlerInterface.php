<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\ErrorHandler\Http;

use Helix\Contracts\ErrorHandler\ErrorHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @package error-handler
 */
interface HttpErrorHandlerInterface extends ErrorHandlerInterface
{
    /**
     * @param \Throwable $e
     * @param ServerRequestInterface|null $request
     * @return ResponseInterface
     */
    public function throw(\Throwable $e, ServerRequestInterface $request = null): ResponseInterface;
}
