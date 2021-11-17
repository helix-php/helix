<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Migrations\Repository;

use Helix\Database\Migrations\MigrationInterface;

/**
 * @template-extends \IteratorAggregate<MigrationInterface>
 * @see MigrationInterface
 */
interface RepositoryInterface extends \IteratorAggregate, \Countable
{
}
