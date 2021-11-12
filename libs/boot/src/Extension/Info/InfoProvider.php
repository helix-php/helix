<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot\Extension\Info;

abstract class InfoProvider implements InfoProviderInterface
{
    /**
     * @param string $name
     * @param string $description
     * @param string $version
     */
    public function __construct(
        protected readonly string $name,
        protected readonly string $description = '',
        protected readonly string $version = 'dev-master',
    ) {}

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion(): string
    {
        return $this->version;
    }
}
