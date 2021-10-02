<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http;

use Helix\Foundation\Http\Kernel as BaseHttpKernel;

class Kernel extends BaseHttpKernel
{
    /**
     * {@inheritDoc}
     */
    public array $middleware = [
    ];
}
