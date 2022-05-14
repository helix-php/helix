<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router;

use Helix\Contracts\ParamResolver\ValueResolverInterface;

interface ProvidesResolversInterface
{
    /**
     * @return iterable<non-empty-string|class-string|ValueResolverInterface>
     */
    public function getResolvers(): iterable;
}
