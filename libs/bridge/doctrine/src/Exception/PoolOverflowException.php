<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\Exception;

class PoolOverflowException extends \OverflowException
{
    /**
     * @return static
     */
    public static function create(): self
    {
        return new self('The maximum allowed number of free connections is used');
    }
}
