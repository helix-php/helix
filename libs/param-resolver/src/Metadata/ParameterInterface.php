<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata;

use Helix\ParamResolver\Metadata\Type\TypeInterface;

/**
 * @template T of TypeInterface
 * @template-implements TypeProviderInterface<T>
 */
interface ParameterInterface extends
    TypeInterface,
    TypeProviderInterface,
    AttributesProviderInterface
{
    /**
     * @return non-empty-string
     */
    public function getName(): string;

    /**
     * @return mixed
     */
    public function getDefaultValue(): mixed;

    /**
     * @return bool
     */
    public function hasDefaultValue(): bool;

    /**
     * @return bool
     */
    public function isVariadic(): bool;

    /**
     * @return bool
     */
    public function isPromoted(): bool;
}
