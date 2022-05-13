<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config;

use Helix\Config\Exception\ConfigException;

interface RegistrarInterface
{
    /**
     * @param array $data
     * @return void
     * @throws ConfigException
     */
    public function add(array $data): void;

    /**
     * @psalm-taint-sink file $pathname
     * @param non-empty-string $pathname
     * @return void
     * @throws ConfigException
     */
    public function addFile(string $pathname): void;
}
