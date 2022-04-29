<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver;

interface ResolverInterface
{
    /**
     * @param MetadataInterface $parameter
     * @return bool
     */
    public function supports(MetadataInterface $parameter): bool;

    /**
     * @param MetadataInterface $parameter
     * @return mixed
     */
    public function resolve(MetadataInterface $parameter): mixed;
}
