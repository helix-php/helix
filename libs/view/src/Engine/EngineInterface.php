<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View\Engine;

use Helix\Contracts\View\ViewInterface;

interface EngineInterface
{
    /**
     * @param non-empty-string $name
     * @param array<non-empty-string, mixed> $vars
     * @return ViewInterface
     */
    public function create(string $name, array $vars = []): ViewInterface;
}
