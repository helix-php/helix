<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controller;

use Helix\Http\HtmlResponse;
use Helix\Http\PermanentRedirectResponse;
use Helix\Router\Attribute\Route;
use Helix\Router\Generator\GeneratorInterface;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    #[Route('/')]
    public function index(GeneratorInterface $route): ResponseInterface
    {
        return new PermanentRedirectResponse(
            $route->generate('home')
        );
    }

    #[Route(path: '/home', as: 'home')]
    public function home(): ResponseInterface
    {
        return new HtmlResponse(
            $this->views->create('welcome.html.php')
        );
    }
}
