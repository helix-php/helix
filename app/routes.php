<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Helix\Router\Router;

return static function (Router $router): void {

    $router->group(function (Router $router): void {
        $router->import(\App\Http\Controller\HomeController::class);
    })
        ->through(\Helix\Session\Http\Middleware\StartSession::class);

    $router->import(\App\Http\Controller\Api\ArticleController::class);

};
