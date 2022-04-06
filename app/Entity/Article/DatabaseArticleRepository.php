<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Article;

use App\Entity\Article;
use Doctrine\ORM\EntityRepository;
use Happyr\DoctrineSpecification\EntitySpecificationRepository;

/**
 * @template-extends EntityRepository<Article>
 */
class DatabaseArticleRepository extends EntitySpecificationRepository implements ArticleRepositoryInterface
{
}