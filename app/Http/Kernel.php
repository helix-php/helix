<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http;

use Helix\Contracts\ParamResolver\ValueResolverInterface;
use Helix\Foundation\Http\Kernel as BaseHttpKernel;
use Psr\Http\Server\MiddlewareInterface;

class Kernel extends BaseHttpKernel
{
    /**
     * @var array<class-string<MiddlewareInterface>|MiddlewareInterface>
     */
    public array $middleware = [
        // This middleware is responsible for embedding information about the
        // current request processing time inside the response headers.
        //
        // @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Server-Timing
        \Helix\Debug\Middleware\ServerTiming::class,
    ];

    /**
     * @var array<class-string<ValueResolverInterface>|ValueResolverInterface>
     */
    public array $resolvers = [
        // This resolver is responsible for getting the entity manager from the
        // connection pool depending on the current HTTP request.
        \Helix\Bridge\Doctrine\ValueResolver\EntityManagerRequestResolver::class,

        // This resolver injects a specific repository when requested in the
        // parameter using an HTTP request dependent connection.
        \App\Http\ValueResolver\DoctrineRepositoryResolver::class,
    ];

    /**
     * @return void
     */
    protected function onBoot(): void
    {
        // Enable middlewares if it has been installed (remove debug)
        $this->middleware = \array_filter($this->middleware, \class_exists(...));
    }
}
