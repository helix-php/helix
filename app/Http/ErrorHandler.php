<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http;

use Helix\Contracts\Router\Exception\NotAllowedExceptionInterface;
use Helix\Contracts\Router\Exception\NotFoundExceptionInterface;
use Helix\Foundation\Http\ErrorHandler as BaseErrorHandler;
use Helix\Http\StatusCode\StatusCode;

class ErrorHandler extends BaseErrorHandler
{
    /**
     * {@inheritDoc}
     */
    public array $mapping = [
        \InvalidArgumentException::class => StatusCode::BAD_REQUEST,
        NotFoundExceptionInterface::class => StatusCode::NOT_FOUND,
        NotAllowedExceptionInterface::class => StatusCode::METHOD_NOT_ALLOWED,
    ];
}
