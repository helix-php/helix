<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Resolver;

use Helix\ParamResolver\MetadataInterface;
use Helix\ParamResolver\ResolverInterface;
use Psr\Container\ContainerInterface;

final class ContainerResolver implements ResolverInterface
{
    /**
     * @param ContainerInterface $container
     */
    public function __construct(
        private readonly ContainerInterface $container,
    ) {
    }

    public function supports(MetadataInterface $parameter): bool
    {
        
    }

    public function resolve(MetadataInterface $parameter): mixed
    {
        // TODO: Implement resolve() method.
    }
}
