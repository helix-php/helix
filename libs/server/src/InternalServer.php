<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server;

use Helix\Foundation\Http\FactoryInterface;

/**
 * @template T of InternalServerCreateInfo
 * @template-extends Server<T>
 */
abstract class InternalServer extends Server
{
    /**
     * @param FactoryInterface $factory
     * @param T $info
     */
    public function __construct(FactoryInterface $factory, InternalServerCreateInfo $info)
    {
        parent::__construct($factory, $info);
    }
}
