<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot\Extension;

enum Status: string implements StatusInterface
{
    /**
     * @var non-empty-string
     */
    case DRAFT = 'Draft';

    /**
     * @var non-empty-string
     */
    case STABLE = 'Stable';

    /**
     * @var non-empty-string
     */
    case DEPRECATED = 'Deprecated';

    /**
     * {@inheritDoc}
     */
    public function toString(): string
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     */
    public function isStable(): bool
    {
        return $this === self::STABLE;
    }

    /**
     * {@inheritDoc}
     */
    public function isDeprecated(): bool
    {
        return $this === self::DEPRECATED;
    }
}
