<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server;

use Helix\Http\Psr17FactoryInterface;

/**
 * @template T of ServerCreateInfo
 */
abstract class Server implements ServerInterface
{
    /**
     * @param Psr17FactoryInterface $factory
     * @param T $info
     */
    public function __construct(
        protected readonly Psr17FactoryInterface $factory,
        protected readonly ServerCreateInfo $info,
    ) {
    }
}
