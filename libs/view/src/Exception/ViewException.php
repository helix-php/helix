<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View\Exception;

use Helix\Contracts\View\Exception\ViewExceptionInterface;

class ViewException extends \Exception implements ViewExceptionInterface
{
    /**
     * @param non-empty-string $message
     * @param positive-int|0 $code
     * @param \Throwable|null $previous
     */
    final public function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
