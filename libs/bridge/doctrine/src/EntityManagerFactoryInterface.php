<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\EntityManagerProvider;

/**
 * @template TReference of object
 */
interface EntityManagerFactoryInterface extends EntityManagerProvider
{
    /**
     * @param TReference|null $reference
     * @return EntityManagerInterface
     */
    public function getDefaultManager(?object $reference = null): EntityManagerInterface;

    /**
     * @param string $name
     * @param TReference|null $reference
     * @return EntityManagerInterface
     */
    public function getManager(string $name, ?object $reference = null): EntityManagerInterface;
}
