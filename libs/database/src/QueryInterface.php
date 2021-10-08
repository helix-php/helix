<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database;

use Helix\Database\Result\ExecutableInterface;
use Helix\Database\Result\ReturnsCollectionInterface;
use Helix\Database\Result\ReturnsScalarInterface;

interface QueryInterface extends
    ReturnsCollectionInterface,
    ReturnsScalarInterface,
    ExecutableInterface,
    \Stringable
{
    /**
     * @param int|string $param
     * @param mixed $value
     * @return $this
     */
    public function with(int|string $param, mixed $value): self;
}
