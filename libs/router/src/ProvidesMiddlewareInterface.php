<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router;

use Psr\Http\Server\MiddlewareInterface;

interface ProvidesMiddlewareInterface
{
    /**
     * @return iterable<non-empty-string|class-string|MiddlewareInterface>
     */
    public function getMiddleware(): iterable;
}
