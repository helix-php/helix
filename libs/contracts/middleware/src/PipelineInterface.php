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

interface PipelineInterface extends MiddlewareInterface
{
    /**
     * @psalm-pure
     * @param MiddlewareInterface ...$middleware
     * @return self
     */
    public function through(MiddlewareInterface ...$middleware): self;
}
