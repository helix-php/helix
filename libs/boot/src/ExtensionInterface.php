<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot;

use Helix\Boot\Extension\Info\InfoProviderInterface;
use Helix\Boot\Attribute\ClassMetadataInterface;
use Helix\Boot\Attribute\MethodMetadataInterface;
use Helix\Boot\Extension\Metadata\MetadataProviderInterface;

/**
 * @template T of object
 *
 * @see MethodMetadataInterface
 * @see ClassMetadataInterface
 */
interface ExtensionInterface extends
    MetadataProviderInterface,
    InfoProviderInterface
{
    /**
     * @return T
     */
    public function getContext(): object;
}
