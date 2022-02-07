<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Reader;

class PhpReader extends Reader
{
    /**
     * {@inheritDoc}
     */
    public function getExtensions(): array
    {
        return ['php'];
    }

    /**
     * {@inheritDoc}
     */
    public function read(string $pathname): array
    {
        \ob_start();
        $result = (array)require $pathname;
        \ob_end_clean();

        return $result;
    }
}
