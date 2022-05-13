<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Processor;

use Helix\Config\Reader\Repository;

final class ParamProcessor extends TokenProcessor
{
    /**
     * @param iterable<non-empty-string, string|int> $variables
     */
    public function __construct(
        iterable $variables = [],
    ) {
        parent::__construct($variables, '%', '%');
    }

    /**
     * @param \Closure():iterable<non-empty-string, string|int> $callable
     * @return static
     */
    public static function fromCallable(\Closure $callable): self
    {
        return new self($callable());
    }
}
