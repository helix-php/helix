<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router\Generator\Exception;

class InvalidRouteNameException extends RouteGeneratorException
{
    /**
     * @var string
     */
    private const DEFAULT_ROUTE_NAME = '<unknown>';

    /**
     * @var string
     */
    public string $name = self::DEFAULT_ROUTE_NAME;

    /**
     * @param string $name
     * @param int $code
     * @param \Throwable|null $prev
     * @return self
     */
    public static function notFound(string $name, int $code = 0, \Throwable $prev = null): self
    {
        $instance = new self(\sprintf('Route named [%s] has not been defined', $name), $code, $prev);
        $instance->name = $name;

        return $instance;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
