<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controller;

use Helix\Contracts\View\FactoryInterface;
use Helix\Http\HtmlResponse;
use Helix\Router\Attribute\Route;
use Psr\Http\Message\ResponseInterface;

class HomeController
{
    #[Route(path: '/', as: 'home')]
    public function index(FactoryInterface $views): ResponseInterface
    {
        return new HtmlResponse(
            $views->create('welcome.html.php')
        );
    }
}
