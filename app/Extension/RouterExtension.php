<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Extension;

use Helix\Boot\Attribute\Singleton;
use Helix\Contracts\Router\RegistrarInterface;
use Helix\Contracts\Router\RepositoryInterface;
use Helix\Contracts\Router\RouterInterface;
use Helix\Foundation\Path;
use Helix\Router\Generator\Generator;
use Helix\Router\Generator\GeneratorInterface;
use Helix\Router\Router;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

final class RouterExtension
{
    /**
     * @param Path $path
     * @param ResponseFactoryInterface $resp
     * @param UriFactoryInterface $uris
     * @return RouterInterface
     */
    #[Singleton(as: [Router::class, RegistrarInterface::class, RepositoryInterface::class])]
    public function getRouter(Path $path, ResponseFactoryInterface $resp, UriFactoryInterface $uris): RouterInterface
    {
        $router = new Router($resp, $uris);

        $registrar = require $path->app('routes.php');
        $registrar($router);

        return $router;
    }

    /**
     * @param UriFactoryInterface $uris
     * @param RepositoryInterface $router
     * @return GeneratorInterface
     */
    #[Singleton(as: [Generator::class])]
    public function getRouteGenerator(UriFactoryInterface $uris, RepositoryInterface $router): GeneratorInterface
    {
        return new Generator($uris, $router);
    }
}
