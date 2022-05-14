<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\ParamResolver;

interface RegistrarInterface
{
    /**
     * @param ValueResolverInterface ...$resolvers
     * @return void
     */
    public function append(ValueResolverInterface ...$resolvers): void;

    /**
     * @param ValueResolverInterface ...$resolvers
     * @return void
     */
    public function prepend(ValueResolverInterface ...$resolvers): void;

    /**
     * @param ValueResolverInterface ...$resolvers
     * @return $this
     */
    public function with(ValueResolverInterface ...$resolvers): self;
}
