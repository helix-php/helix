<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Http\Extension;

use Helix\Boot\Attribute\Singleton;
use Helix\Http\Psr17Factory;
use Helix\Http\Psr17FactoryInterface;
use Nyholm\Psr7\Factory\Psr17Factory as NyholmPsr17Factory;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

final class HttpExtension
{
    /**
     * @var array<class-string>
     */
    private const PSR_FACTORY_ALIASES = [
        Psr17Factory::class,
        RequestFactoryInterface::class,
        ServerRequestFactoryInterface::class,
        ResponseFactoryInterface::class,
        StreamFactoryInterface::class,
        UploadedFileFactoryInterface::class,
        UriFactoryInterface::class
    ];

    #[Singleton(as: self::PSR_FACTORY_ALIASES)]
    public function getFactory(): Psr17FactoryInterface
    {
        return Psr17Factory::fromFactory(
            new NyholmPsr17Factory()
        );
    }
}
