<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Reader;

class JsonReader extends Reader
{
    /**
     * {@inheritDoc}
     */
    public function fromString(string $data): array
    {
        return (array)\json_decode($data, true, flags: \JSON_THROW_ON_ERROR);
    }
}
