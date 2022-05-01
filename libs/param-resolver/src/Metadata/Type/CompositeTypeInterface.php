<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata\Type;

/**
 * @template-implements \ArrayAccess<positive-int|0, TypeInterface>
 * @template-implements \IteratorAggregate<positive-int|0, TypeInterface>
 */
interface CompositeTypeInterface extends
    TypeInterface,
    \Countable,
    \ArrayAccess,
    \IteratorAggregate
{
}
