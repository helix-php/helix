<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Router;

use Helix\Contracts\Router\Exception\NotAllowedExceptionInterface;
use Helix\Contracts\Router\Exception\NotFoundExceptionInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @package router-contracts
 */
interface RouterInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return MatchedRouteInterface
     *
     * @throws NotAllowedExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function match(ServerRequestInterface $request): MatchedRouteInterface;
}
