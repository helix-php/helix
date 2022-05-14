<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\ValueResolver;

use Doctrine\Persistence\ObjectRepository;
use Helix\Bridge\Doctrine\ValueResolver\RepositoryRequestResolver;

final class DoctrineRepositoryResolver extends RepositoryRequestResolver
{
    /**
     * This list contains the interfaces of the repositories and the entity
     * classes that these repositories return.
     *
     * Feel free to edit it.
     *
     * @var array<class-string<ObjectRepository>, class-string>
     */
    protected array $repositories = [
        \App\Entity\Article\ArticleRepositoryInterface::class => \App\Entity\Article::class,
    ];
}
