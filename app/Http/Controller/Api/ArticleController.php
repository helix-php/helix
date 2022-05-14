<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controller\Api;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Helix\Http\JsonResponse;
use Helix\Router\Attribute\Group;
use Helix\Router\Attribute\Route;
use Psr\Http\Message\ResponseInterface;

#[Group(prefix: 'api', suffix: '{suffix}', where: ['suffix' => '(?:\.json)?'])]
final class ArticleController
{
    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(
        private readonly EntityManagerInterface $em,
    ) {
    }

    #[Route(path: 'articles', as: 'api.articles')]
    public function index(): ResponseInterface
    {
        $articles = $this->em->getRepository(Article::class);

        return new JsonResponse($articles->findAll());
    }
}
