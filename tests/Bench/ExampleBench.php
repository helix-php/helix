<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Tests\Bench;

use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\Revs;
use PhpBench\Attributes\Warmup;

#[Revs(10), Warmup(2), Iterations(100)]
class ExampleBench
{
    public function benchFirst(): void
    {
        usleep(1);
    }

    public function benchSecond(): void
    {
        usleep(2);
    }
}
