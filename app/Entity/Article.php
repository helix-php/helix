<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity, ORM\Table(name: 'articles')]
class Article
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(name: 'id')]
    public int $id;
}
