<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot\Extension;

final class Version implements VersionInterface
{
    /**
     * @param positive-int|0 $major
     * @param positive-int|0 $minor
     * @param positive-int|0 $patch
     */
    public function __construct(
        private int $major = 1,
        private int $minor = 0,
        private int $patch = 0,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getMajor(): int
    {
        return $this->major;
    }

    /**
     * {@inheritDoc}
     */
    public function getMinor(): int
    {
        return $this->minor;
    }

    /**
     * {@inheritDoc}
     */
    public function getPatch(): int
    {
        return $this->patch;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return \vsprintf('%d.%d.%d', [
            $this->getMajor(),
            $this->getMinor(),
            $this->getPatch(),
        ]);
    }
}
