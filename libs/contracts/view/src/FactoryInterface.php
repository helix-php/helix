<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\View;

use Helix\View\ViewNotFoundException;

interface FactoryInterface
{
    /**
     * @param non-empty-string $name
     * @param iterable<non-empty-string, mixed> $vars
     * @return ViewInterface
     * @throws ViewNotFoundException
     */
    public function create(string $name, iterable $vars = []): ViewInterface;
}
