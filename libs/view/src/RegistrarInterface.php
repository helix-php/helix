<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View;

use Helix\View\Engine\EngineInterface;

interface RegistrarInterface
{
    /**
     * @param non-empty-string|iterable<non-empty-string> $ext
     * @param EngineInterface $engine
     */
    public function register(string|iterable $ext, EngineInterface $engine): void;
}
