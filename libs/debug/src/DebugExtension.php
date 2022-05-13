<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Debug;

use Helix\Boot\Attribute\Info;
use Helix\Boot\Attribute\Registration;
use Helix\Debug\Command\DebugExtensionsCommand;
use Helix\Debug\Command\DebugRouterCommand;
use Helix\Foundation\Console\Application;

#[Info(name: 'Kernel Debug Extension', description: 'Provides list of debug utils')]
class DebugExtension
{
    #[Registration(ifServiceExists: Application::class)]
    public function addCommands(Application $cli): void
    {
        $cli->add(DebugExtensionsCommand::class);
        $cli->add(DebugRouterCommand::class);
    }
}
