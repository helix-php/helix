<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router\Attribute;

use Helix\Contracts\Router\RouteInterface;

/**
 * @see RouteInterface
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
final class Group
{
    /**
     * @param string $prefix
     * @param string $suffix
     * @param array $middleware
     * @param array<non-empty-string, string> $where
     */
    public function __construct(
        public readonly string $prefix = '',
        public readonly string $suffix = '',
        public readonly array $middleware = [],
        public readonly array $where = [],
    ) {
    }
}
