<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Purify\Attribute;

final class Reader
{
    /**
     * @param \ReflectionClass $class
     * @return Purify|null
     */
    public function read(\ReflectionClass $class): ?Purify
    {
        foreach ($class->getAttributes(Purify::class) as $attribute) {
            return $attribute->newInstance();
        }

        $parent = $class->getParentClass();

        if ($parent instanceof \ReflectionClass) {
            return $this->read($parent);
        }

        return null;
    }
}
