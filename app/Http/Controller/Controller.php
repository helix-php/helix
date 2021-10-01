<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controller;

use Helix\Contracts\View\FactoryInterface;
use Helix\Foundation\Path;

abstract class Controller
{
    public function __construct(
        protected Path $path,
        protected FactoryInterface $views
    ) {
    }
}
