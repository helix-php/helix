<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config;

interface ConfigInterface
{
    /**
     * @param non-empty-string $section
     * @param array $default
     * @return array
     */
    public function get(string $section, array $default = []): array;
}
