<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Console\Command;

use Helix\Foundation\Application;
use Helix\Foundation\Console\Command;

class ExampleCommand extends Command
{
    protected string $name = 'app:test';
    protected string $description = 'An example application command';

    public function invoke(Application $app): void
    {
        $this->output->writeln('Hello World!');

        $this->item(' - PHP', \sprintf('<comment>%s</comment>', \PHP_VERSION));
        $this->item(' - Helix', \sprintf('<comment>%s</comment>', $app->version));
    }
}
