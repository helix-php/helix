<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Mime;

interface CategoryInterface
{
    /**
     * Mime type category (registry) name.
     *
     * @link https://www.iana.org/assignments/media-types/media-types.xhtml
     *
     * @return non-empty-string
     */
    public function getName(): string;
}
