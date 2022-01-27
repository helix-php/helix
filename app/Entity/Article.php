<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Article\DatabaseArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Please note that you should run first:
 *
 *  $ php do orm:schema-tool:create
 *
 */
#[ORM\Table(name: 'articles')]
#[ORM\Entity(repositoryClass: DatabaseArticleRepository::class)]
class Article
{
    /**
     * @var positive-int|0
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: Types::BIGINT)]
    public int $id;

    /**
     * @var non-empty-string
     */
    #[ORM\Column(name: 'title', type: Types::STRING)]
    public string $title;

    /**
     * @var string
     */
    #[ORM\Column(name: 'content', type: Types::TEXT)]
    public string $content;

    /**
     * @var \DateTimeInterface
     */
    #[ORM\Column(name: 'created_at', type: Types::DATETIMETZ_IMMUTABLE)]
    public \DateTimeInterface $createdAt;

    /**
     * @var \DateTimeInterface
     */
    #[ORM\Column(name: 'updated_at', type: Types::DATETIMETZ_IMMUTABLE)]
    public \DateTimeInterface $updatedAt;
}
