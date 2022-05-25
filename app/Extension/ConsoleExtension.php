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
use Helix\Boot\Attribute\Register;
use Helix\Foundation\Console\Application;

final class ConsoleExtension
{
    #[Register(afterResolved: Application::class)]
    public function registerConsoleCommands(Application $app): void
    {
        $app->add(ExampleCommand::class);
    }
}
