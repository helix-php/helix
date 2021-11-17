<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Migrations;

use Helix\Database\Manager\DriverManager;
use Helix\Database\Manager\DriverManagerInterface;
use Helix\Database\Migrations\Repository\FileRepository;
use Helix\Database\Migrations\Repository\RepositoryInterface;
use Helix\Database\Migrations\Schema\Factory;
use Helix\Database\Migrations\Schema\FactoryInterface;

final class MigratorCreateInfo
{
    /**
     * @param DriverManagerInterface $database
     * @param RepositoryInterface $repository
     * @param FactoryInterface $schema
     */
    public function __construct(
        public readonly DriverManagerInterface $database = new DriverManager(),
        public readonly RepositoryInterface $repository = new FileRepository(),
        public readonly FactoryInterface $schema = new Factory(),
    ) {}
}
