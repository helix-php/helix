<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Extension;

use App\Console\Command\ExampleCommand;
use Helix\Boot\Attribute\Registration;
use Helix\Foundation\Console\Application;

class ConsoleExtension
{
    #[Registration(ifServiceExists: Application::class)]
    public function registerConsoleCommands(Application $app): void
    {
        $app->add(ExampleCommand::class);
    }
}
