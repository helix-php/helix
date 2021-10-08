<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View\Engine\Php;

use Helix\View\Engine\FilesystemAwareEngine;
use Helix\View\ViewNotFoundException;

final class PhpEngine extends FilesystemAwareEngine
{
    /**
     * {@inheritDoc}
     */
    public function create(string $name, iterable $vars = []): PhpView
    {
        $pathname = $this->lookup($name);

        if ($pathname === null) {
            throw ViewNotFoundException::create($name);
        }

        return new PhpView($pathname, $vars);
    }
}
