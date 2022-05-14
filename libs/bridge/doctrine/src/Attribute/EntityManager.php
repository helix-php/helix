<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\Attribute;

#[\Attribute(\Attribute::TARGET_PARAMETER)]
class EntityManager
{
    /**
     * @param string $name
     */
    public function __construct(
        public readonly string $name,
    ) {
    }
}
