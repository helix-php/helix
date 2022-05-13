<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot\Extension\Info;

use Composer\InstalledVersions;
use phpDocumentor\Reflection\DocBlockFactory;

final class ComposerInfoProvider extends InfoProvider
{
    /**
     * @param string $package
     * @param \ReflectionClass $context
     * @return static
     */
    public static function create(string $package, \ReflectionClass $context): self
    {
        return new self(
            self::parseName($context),
            \trim(self::parseDescription($context)),
            self::parseVersion($package),
        );
    }

    /**
     * @param string $package
     * @return string
     */
    private static function parseVersion(string $package): string
    {
        return InstalledVersions::getVersion($package) ?: 'dev-master';
    }

    /**
     * @param \ReflectionClass $context
     * @return string
     */
    private static function parseDescription(\ReflectionClass $context): string
    {
        return DocBlockFactory::createInstance()
            ->create($context->getDocComment() ?: '/** */')
            ->getDescription()
            ->getBodyTemplate()
        ;
    }

    /**
     * @param \ReflectionClass $class
     * @return string
     */
    private static function parseName(\ReflectionClass $class): string
    {
        return $class->getShortName();
    }
}
