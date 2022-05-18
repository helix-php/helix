<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Header;

abstract class HeaderValue implements HeaderValueInterface
{
    /**
     * @param array $attributes
     * @return array
     */
    protected function filter(array $attributes): array
    {
        return \array_filter($attributes, fn ($value) => $value !== '' && \is_scalar($value));
    }

    /**
     * @param array $attributes
     * @param non-empty-string $joinItems
     * @param non-empty-string $joinKv
     * @return string
     */
    protected function build(array $attributes, string $joinItems = ';', string $joinKv = '='): string
    {
        $result = [];

        foreach ($this->filter($attributes) as $key => $value) {
            $result[] = \is_string($key) && $key !== ''
                ? $value
                : $key . $joinKv . $value;
        }

        return \implode($joinItems, $result);
    }
}
