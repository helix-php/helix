<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Resolver;

use Helix\ParamResolver\Metadata\ParameterInterface;

interface ResolverInterface
{
    /**
     * @param ParameterInterface $parameter
     * @return mixed
     */
    public function resolve(ParameterInterface $parameter): mixed;
}