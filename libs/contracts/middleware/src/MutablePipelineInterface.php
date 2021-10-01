<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Middleware;

use Psr\Http\Server\MiddlewareInterface;

/**
 * @package middleware-contracts
 */
interface MutablePipelineInterface extends PipelineInterface
{
    /**
     * @param MiddlewareInterface $middleware
     * @return $this
     */
    public function append(MiddlewareInterface $middleware): self;

    /**
     * @param MiddlewareInterface $middleware
     * @return $this
     */
    public function prepend(MiddlewareInterface $middleware): self;
}
