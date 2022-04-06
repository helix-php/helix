<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router\Exception;

use Helix\Contracts\Router\Exception\RouteMatchingExceptionInterface;
use Psr\Http\Message\ServerRequestInterface;

class RouteMatchingException extends RouterException implements RouteMatchingExceptionInterface
{
    /**
     * @var ServerRequestInterface
     */
    private ServerRequestInterface $request;

    /**
     * @param ServerRequestInterface $request
     * @param string $msg
     * @param int $code
     * @param \Throwable|null $prev
     */
    public function __construct(ServerRequestInterface $request, string $msg, int $code = 0, \Throwable $prev = null)
    {
        $this->request = $request;

        parent::__construct($msg, $code, $prev);
    }

    /**
     * {@inheritDoc}
     */
    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }
}
