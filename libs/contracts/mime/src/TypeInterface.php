<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Mime;

interface TypeInterface
{
    /**
     * Returns string representation of the mime-type name.
     *
     * @return non-empty-string
     */
    public function getName(): string;

    /**
     * Returns full string representation of the mime-type name.
     *
     * @return non-empty-string
     */
    public function getFullName(): string;

    /**
     * Returns category of the mime-type.
     *
     * @return CategoryInterface
     */
    public function getCategory(): CategoryInterface;
}
