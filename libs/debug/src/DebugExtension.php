<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Debug;

use Helix\Boot\Attribute\Registration;
use Helix\Boot\RepositoryInterface;
use Helix\Debug\Command\DebugExtensionsCommand;
use Symfony\Component\Console\Application;

class DebugExtension
{
    #[Registration(ifServiceExists: Application::class)]
    public function addCommands(Application $cli, RepositoryInterface $boot): void
    {
        $cli->add(new DebugExtensionsCommand($boot));
    }
}
