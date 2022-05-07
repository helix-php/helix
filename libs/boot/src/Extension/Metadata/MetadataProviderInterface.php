<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot\Extension\Metadata;

use Helix\Boot\Attribute\ClassMetadataInterface;
use Helix\Boot\Attribute\MethodMetadataInterface;

interface MetadataProviderInterface
{
    /**
     * @template T of ClassMetadata
     * @param class-string<T>|null $attribute
     * @return iterable<T>
     *@see ClassMetadataInterface
     *
     */
    public function getClassMetadata(string $attribute = null): iterable;

    /**
     * @template T of MethodMetadata
     * @param class-string<T>|null $attribute
     * @return iterable<T, \ReflectionMethod>
     *@see MethodMetadataInterface
     *
     */
    public function getMethodMetadata(string $attribute = null): iterable;
}
