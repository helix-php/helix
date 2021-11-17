<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Extension;

use Helix\Boot\Attribute\Registration;
use Helix\Boot\Attribute\Singleton;
use Helix\Foundation\Path;
use Helix\Http\Psr17FactoryInterface;
use Helix\Server\Sapi\Command\SapiServeCommand;
use Helix\Server\Sapi\Emitter\BodyBehaviour;
use Helix\Server\Sapi\Emitter\HeadersBehaviour;
use Helix\Server\Sapi\EmitterCreateInfo;
use Helix\Server\Sapi\Server;
use Helix\Server\Sapi\ServerCreateInfo;
use Helix\Server\ServerInterface;
use Helix\Foundation\Console\Application as CliApplication;

final class ServerExtension
{
    #[Singleton]
    public function getServer(Psr17FactoryInterface $factory): ServerInterface
    {
        return new Server($factory, new ServerCreateInfo(
            vars: $_SERVER,
            emitter: new EmitterCreateInfo(
                bufferLength: 1024,
                headers: HeadersBehaviour::SKIP,
                body: BodyBehaviour::APPEND,
            )
        ));
    }

    #[Registration(ifServiceExists: CliApplication::class)]
    public function addServeCommand(CliApplication $cli, Path $path): void
    {
        $cli->add(new SapiServeCommand($path->public));
    }
}
