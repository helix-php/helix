<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Exception;

use Helix\Contracts\Database\QueryInterface;

class QueryException extends ClientException
{
    /**
     * @param string $message
     * @param int $code
     * @param QueryInterface|null $query
     * @return static
     */
    public static function create(string $message, int $code, QueryInterface $query = null): self
    {
        \preg_match('/near\h"(.+?)"/ui', $message, $matches);

        if ($query !== null) {
            $suffix = 'in query "' . \addcslashes((string)$query, '"') . '"';
            $message = isset($matches[1])
                ? "Syntax error $suffix near \"${matches[1]}\""
                : "$message $suffix"
            ;
        }

        return new static($message, $code);
    }
}
