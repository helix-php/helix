<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Router;

interface GroupInterface
{
    /**
     * @param string $name
     * @param string $pattern
     * @return $this
     */
    public function where(string $name, string $pattern): self;

    /**
     * @param mixed ...$middleware
     * @return $this
     */
    public function through(mixed ...$middleware): self;

    /**
     * @param string $prefix
     * @param bool $concat
     * @return $this
     */
    public function prefix(string $prefix, bool $concat = false): self;

    /**
     * @param string $suffix
     * @param bool $concat
     * @return $this
     */
    public function suffix(string $suffix, bool $concat = true): self;

    /**
     * @param mixed $action
     * @return $this
     */
    public function then(mixed $action): self;
}
