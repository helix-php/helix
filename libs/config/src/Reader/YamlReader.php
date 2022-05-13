<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Reader;

use Helix\Config\Exception\ConfigException;
use Symfony\Component\Yaml\Yaml;

class YamlReader extends Reader
{
    /**
     * @var non-empty-string
     */
    private const ERROR_PACKAGE_REQUIRED = 'You need to install the'
        . ' "symfony/yaml" package to work with yaml configs';

    /**
     * {@inheritDoc}
     */
    public function fromString(string $data): array
    {
        if (!\class_exists(Yaml::class)) {
            throw new ConfigException(self::ERROR_PACKAGE_REQUIRED);
        }

        return (array)Yaml::parse($data);
    }
}
