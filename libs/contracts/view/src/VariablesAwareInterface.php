<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\View;

interface VariablesAwareInterface
{
    /**
     * @param non-empty-string $variable
     * @param mixed $value
     * @return $this
     */
    public function add(string $variable, mixed $value): self;

    /**
     * @param non-empty-string $variable
     * @return bool
     */
    public function has(string $variable): bool;

    /**
     * @param non-empty-string $variable
     * @param mixed|null $default
     * @return mixed
     */
    public function get(string $variable, mixed $default = null): mixed;
}
