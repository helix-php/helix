<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation;

use Helix\Contracts\ErrorHandler\ErrorHandlerInterface;
use Psr\Log\LoggerInterface;

abstract class ErrorHandler implements ErrorHandlerInterface
{
    /**
     * @var array<class-string<\Throwable>>
     */
    protected array $notLoggable = [];

    /**
     * @param LoggerInterface|null $logger
     */
    public function __construct(
        protected ?LoggerInterface $logger = null
    ) {
    }

    /**
     * @param \Throwable $e
     * @return bool
     */
    protected function isReportable(\Throwable $e): bool
    {
        foreach ($this->notLoggable as $class) {
            if (\is_a($e, $class, true)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param \Throwable $e
     */
    protected function report(\Throwable $e): void
    {
        if ($this->isReportable($e)) {
            $this->logger?->error($e->getMessage(), [
                'file'  => $e->getFile(),
                'line'  => $e->getLine(),
                'trace' => $e->getTrace(),
            ]);
        }
    }
}
