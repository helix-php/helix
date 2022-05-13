<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config;

final class StaticConfig implements ConfigInterface
{
    /**
     * @param array $config
     */
    public function __construct(
        private readonly array $config,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $section, array $default = []): array
    {
        return (array)($this->config[$section] ?? $default);
    }
}
