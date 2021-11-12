<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Http\StatusCode;

/**
 * @package http-status-code-contracts
 */
interface StatusCodeInterface
{
    /**
     * @return positive-int|0
     */
    public function getCode(): int;

    /**
     * @return string
     */
    public function getReasonPhrase(): string;

    /**
     * @return CategoryInterface
     */
    public function getCategory(): CategoryInterface;
}
