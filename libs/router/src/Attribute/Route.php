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
use Helix\Http\Method\Method;

/**
 * @see RouteInterface
 *
 * @psalm-import-type MiddlewareDefinition from RouteInterface
 */
#[\Attribute(\Attribute::IS_REPEATABLE | \Attribute::TARGET_METHOD)]
final class Route
{
    /**
     * @param non-empty-string $path
     * @param Method $method
     * @param non-empty-string|null $as
     * @param array<non-empty-string, string> $where
     * @param array $middleware
     */
    public function __construct(
        public readonly string $path,
        public readonly Method $method = Method::GET,
        public readonly ?string $as = null,
        public readonly array $where = [],
        public readonly array $middleware = [],
    ) {
    }
}
