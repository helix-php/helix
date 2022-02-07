<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config;

use Helix\Config\Exception\ValidationExceptionInterface;

interface ValidatorInterface
{
    /**
     * @param mixed $payload
     * @return list<ValidationExceptionInterface>|null
     */
    public function validate(mixed $payload): ?iterable;
}
