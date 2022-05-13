<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container;

use Helix\Container\Definition\DefinitionInterface;

/**
 * @template-implements \IteratorAggregate<non-empty-string, DefinitionInterface>
 */
interface RepositoryInterface extends \IteratorAggregate, \Countable
{
}
