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
use Helix\Boot\Attribute\ClassMetadata;
use Helix\Boot\Attribute\MethodMetadata;
use Helix\Boot\Extension\Metadata\MetadataProviderInterface;

/**
 * @see MethodMetadata
 * @see ClassMetadata
 */
interface ExtensionInterface extends
    MetadataProviderInterface,
    InfoProviderInterface
{
    /**
     * @return object
     */
    public function getContext(): object;
}
