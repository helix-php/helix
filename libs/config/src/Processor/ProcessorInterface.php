<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Processor;

interface ProcessorInterface
{
    /**
     * @param string $value
     * @param int|string $key
     * @return string
     */
    public function process(string $value, int|string $key): string;
}
