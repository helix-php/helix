<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View\Exception;

class EngineNotFoundException extends ViewException
{
    /**
     * @var non-empty-string|null
     */
    protected ?string $name = null;

    /**
     * @param non-empty-string $view
     * @param positive-int|0 $code
     * @param \Throwable|null $prev
     * @return static
     */
    public static function create(string $view, int $code = 0, \Throwable $prev = null): static
    {
        $instance = new static(\sprintf('Can not resolve engine for [%s] view', $view), $code, $prev);
        $instance->name = $view;

        return $instance;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name ?? 'unknown';
    }
}
