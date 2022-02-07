<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Extension;

use App\Http\Controller\HomeController;
use Helix\Boot\Attribute\Singleton;
use Helix\Contracts\Router\RegistrarInterface;
use Helix\Contracts\Router\RepositoryInterface;
use Helix\Contracts\Router\RouterInterface;
use Helix\Router\Exception\BadRouteDefinitionException;
use Helix\Router\Generator\Generator;
use Helix\Router\Generator\GeneratorInterface;
use Helix\Router\Router;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

final class RouterExtension
{
    /**
     * @param Router $router
     * @return void
     * @throws BadRouteDefinitionException
     */
    private function routes(Router $router): void
    {
        $router->import(\App\Http\Controller\HomeController::class);
    }

    /**
     * @param ResponseFactoryInterface $resp
     * @param UriFactoryInterface $uris
     * @return RouterInterface
     * @throws BadRouteDefinitionException
     */
    #[Singleton(as: [Router::class, RegistrarInterface::class, RepositoryInterface::class])]
    public function getRouter(ResponseFactoryInterface $resp, UriFactoryInterface $uris): RouterInterface
    {
        $this->routes($router = new Router($resp, $uris));

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
