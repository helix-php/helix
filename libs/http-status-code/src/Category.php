<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\StatusCode;

use Helix\Contracts\Http\StatusCode\CategoryInterface;

enum Category: int implements CategoryInterface
{
    /**
     * @var int
     */
    case UNKNOWN = 0;

    /**
     * @var int
     */
    case INFORMATIONAL = 100;

    /**
     * @var int
     */
    case SUCCESSFUL = 200;

    /**
     * @var int
     */
    case REDIRECTION = 300;

    /**
     * @var int
     */
    case CLIENT_ERROR = 400;

    /**
     * @var int
     */
    case SERVER_ERROR = 500;

    /**
     * {@inheritDoc}
     */
    public function isError(bool $server = false): bool
    {
        $case = $server ? self::SERVER_ERROR : self::CLIENT_ERROR;

        return $this->value >= $case->value;
    }

    /**
     * @param int $code
     * @return static
     * @psalm-suppress UndefinedPropertyFetch
     */
    public static function parse(int $code): self
    {
        $cases = self::cases();
        \uasort($cases, static fn(self $a, self $b): int => $b->value <=> $a->value);

        foreach ($cases as $case) {
            if ($code > $case->value) {
                return $case;
            }
        }

        return Category::UNKNOWN;
    }
}
