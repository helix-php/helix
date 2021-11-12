<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Config;

interface RepositoryInterface
{
    /**
     * @param non-empty-string $section
     * @param mixed|null $default
     * @return mixed
     */
    public function get(string $section, mixed $default = null): mixed;

    /**
     * @param non-empty-string $section
     * @return bool
     */
    public function has(string $section): bool;
}
