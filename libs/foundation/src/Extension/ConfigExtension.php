<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Extension;

use Helix\Boot\Attribute\Info;
use Helix\Boot\Attribute\Singleton;
use Helix\Config\Config;
use Helix\Config\ConfigInterface;
use Helix\Config\Processor\EnvProcessor;
use Helix\Config\Processor\MutableProcessorsRepositoryInterface;
use Helix\Config\Processor\ParamProcessor;
use Helix\Config\Processor\ProcessorInterface;
use Helix\Config\Processor\ProcessorsRepositoryInterface;
use Helix\Config\Processor\Repository as ProcessorsRepository;
use Helix\Config\Reader\JsonReader;
use Helix\Config\Reader\MutableReadersRepositoryInterface;
use Helix\Config\Reader\PhpReader;
use Helix\Config\Reader\ReadersRepositoryInterface;
use Helix\Config\Reader\Repository as ReadersRepository;
use Helix\Config\Reader\YamlReader;
use Helix\Config\RegistrarInterface;
use Helix\Foundation\Path;

#[Info(
    name: 'Kernel Configuration Extension',
    description: 'Provides framework configuration utils'
)]
final class ConfigExtension
{
    #[Singleton(as: [
        ConfigInterface::class,
        RegistrarInterface::class,
    ])]
    public function getConfiguration(Path $path): Config
    {
        return new Config([$path->config], $this->getReaders(), $this->getProcessors($path));
    }

    #[Singleton(as: [
        ProcessorInterface::class,
        ProcessorsRepositoryInterface::class,
        MutableProcessorsRepositoryInterface::class,
    ])]
    public function getProcessors(Path $path): ProcessorsRepository
    {
        return new ProcessorsRepository([
            EnvProcessor::fromGlobals(),
            ParamProcessor::fromCallable(function () use ($path) {
                foreach (\get_object_vars($path) as $key => $value) {
                    yield 'path.' . $key => $value;
                }
            }),
        ]);
    }

    #[Singleton(as: [
        ReadersRepositoryInterface::class,
        MutableReadersRepositoryInterface::class,
    ])]
    private function getReaders(): ReadersRepository
    {
        return ReadersRepository::fromCallable(function (): iterable {
            yield 'php' => new PhpReader();
            yield ['yml', 'yaml'] => new YamlReader();
            yield 'json' => new JsonReader();
        });
    }
}
