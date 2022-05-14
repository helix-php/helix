<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Cache;

use Cache\Adapter\Filesystem\FilesystemCachePool;
use Helix\Boot\Attribute\Singleton;
use Helix\Foundation\Path;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Psr\Cache\CacheItemPoolInterface;
use Psr\SimpleCache\CacheInterface;

final class CacheExtension
{
    #[Singleton(as: CacheItemPoolInterface::class)]
    public function getCache(Path $path): CacheInterface
    {
        $filesystem = new Filesystem(new Local($path->storage));

        return new FilesystemCachePool($filesystem);
    }
}
