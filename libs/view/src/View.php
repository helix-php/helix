<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View;

use Helix\Contracts\View\ViewInterface;

abstract class View implements ViewInterface
{
    use VariablesAwareTrait;

    /**
     * @param non-empty-string $name
     * @param iterable<non-empty-string, mixed> $vars
     */
    public function __construct(protected string $name, iterable $vars = [])
    {
        $this->addMany($vars);
    }
}
