<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View\Engine\Twig;

use Helix\View\View;
use Twig\Environment;
use Twig\Error\Error;

final class TwigView extends View
{
    /**
     * @param Environment $twig
     * @param non-empty-string $name
     * @param iterable<non-empty-string, mixed> $vars
     */
    public function __construct(private Environment $twig, string $name, iterable $vars = [])
    {
        parent::__construct($name, $vars);
    }

    /**
     * @return string
     * @throws Error
     */
    public function __toString(): string
    {
        return $this->twig->render($this->name, $this->vars);
    }
}
