<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Console\Extension;

use Helix\Boot\Attribute\Registration;
use Helix\Boot\RepositoryInterface;
use Helix\Foundation\Console\Command\ExtListCommand;
use Helix\Foundation\Console\Command\ExtPublishCommand;
use Helix\Foundation\Path;
use Symfony\Component\Console\Application;

/**
 * @package foundation
 */
class ConsoleCommandsExtension
{
    #[Registration(ifServiceExists: Application::class)]
    public function addCommands(Application $cli, Path $path, RepositoryInterface $boot): void
    {
        $cli->add(new ExtPublishCommand($path->config, $boot));
        $cli->add(new ExtListCommand($boot));
    }
}
