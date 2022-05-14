<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controller\Api;

use App\Entity\Article\ArticleRepositoryInterface;
use Helix\Http\JsonResponse;
use Helix\Router\Attribute\Group;
use Helix\Router\Attribute\Route;
use Psr\Http\Message\ResponseInterface;

#[Group(prefix: 'api', suffix: '{ext}', where: ['ext' => '(?:\.json)?'])]
final class ArticleController
{
    /**
     * @param ArticleRepositoryInterface $articles
     */
    public function __construct(
        private readonly ArticleRepositoryInterface $articles,
    ) {
    }

    #[Route(path: 'articles', as: 'api.articles')]
    public function index(): ResponseInterface
    {
        return new JsonResponse($this->articles->findAll());
    }
}
