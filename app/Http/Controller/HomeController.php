<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controller;

use Helix\Async\Task;
use Helix\Contracts\Database\ConnectionInterface;
use Helix\Contracts\Database\ResultInterface;
use Helix\Contracts\View\FactoryInterface;
use Helix\Http\HtmlResponse;
use Helix\Http\JsonResponse;
use Helix\Http\PermanentRedirectResponse;
use Helix\Router\Attribute\Route;
use Helix\Router\Generator\GeneratorInterface;
use Psr\Http\Message\ResponseInterface;

class HomeController
{
    #[Route('/')]
    public function index(GeneratorInterface $route): ResponseInterface
    {
        return new PermanentRedirectResponse(
            $route->generate('home')
        );
    }

    #[Route(path: '/home', as: 'home')]
    public function home(FactoryInterface $views): ResponseInterface
    {
        return new HtmlResponse(
            $views->create('welcome.html.php')
        );
    }

    #[Route(path: 'users.json', as: 'users')]
    public function users(ConnectionInterface $db): ResponseInterface
    {
        $result = [];

        // Create users table
        $db->execute(<<<'SQL'
            CREATE TABLE users (
                id INTEGER PRIMARY KEY,
                name TEXT NOT NULL
            )
        SQL);

        // Sync insertion
        $db->execute('INSERT INTO `users` (`name`) VALUES ("Vasya")');

        // Async insertion
        $insert = Task::async(static fn (): ResultInterface => $db->execute(
            'INSERT INTO `users` (`name`) VALUES ("Petya")'
        ));

        // Selection
        $selection = $db->query('SELECT * FROM `users`');

        // Expected
        //  array(2) { id => 1, name => 'Vasya' }
        foreach ($selection->execute() as $item) {
            $result[] = $item;
        }

        // Execute async task
        Task::await($insert);

        // Expected
        //  array(2) { id => 1, name => 'Vasya' }
        //  array(2) { id => 2, name => 'Petya' }
        foreach ($selection->execute() as $item) {
            $result[] = $item;
        }

        return new JsonResponse($result);
    }
}
