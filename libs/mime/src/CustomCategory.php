<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Mime;

use Helix\Contracts\Mime\CategoryInterface;

/**
 * @internal Helix\Mime\CustomCategory is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Mime
 */
final class CustomCategory implements CategoryInterface
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        private readonly string $name,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }
}
