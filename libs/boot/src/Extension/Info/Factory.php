<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot\Extension\Info;

use Helix\Boot\Attribute\Info;
use Composer\InstalledVersions;
use Helix\Boot\Extension\Metadata\MetadataProviderInterface;

final class Factory
{
    /**
     * @var array<string, string>
     */
    private array $paths = [];

    /**
     * @var string
     */
    private string $root;

    /**
     * @param MetadataProviderInterface $provider
     */
    public function __construct(
        private readonly MetadataProviderInterface $provider
    ) {
        $this->root = InstalledVersions::getRootPackage()['name'] ?? '__root__';
        $this->loadPackagePaths();
    }

    /**
     * @param \ReflectionClass $context
     * @return InfoProviderInterface
     */
    public function create(\ReflectionClass $context): InfoProviderInterface
    {
        $result = MutableInfoProvider::fromProvider(
            ComposerInfoProvider::create(
                $this->lookup($context->getFileName()) ?? $this->root,
                $context
            )
        );

        /** @var Info $info */
        foreach ($this->provider->getClassMetadata(Info::class) as $info) {
            if ($info->name !== null) {
                $result->name = $info->name;
            }

            if ($info->description !== null) {
                $result->description = $info->description;
            }

            if ($info->version !== null) {
                $result->version = $info->version;
            }
        }

        return $result;
    }

    /**
     * @return void
     */
    private function loadPackagePaths(): void
    {
        [$section] = InstalledVersions::getAllRawData();

        foreach ($section['versions'] ?? [] as $name => $info) {
            if (isset($info['install_path'])) {
                $this->paths[\realpath($info['install_path'])] = $name;
            }
        }
    }

    /**
     * @param string $file
     * @return string|null
     */
    private function lookup(string $file): ?string
    {
        $file = \realpath($file);

        foreach ($this->paths as $path => $name) {
            if ($name !== $this->root && \str_starts_with($file, $path)) {
                return $name;
            }
        }

        return null;
    }
}
