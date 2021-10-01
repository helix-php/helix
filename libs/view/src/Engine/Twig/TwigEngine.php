<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View\Engine\Twig;

use Helix\View\Engine\Engine;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Loader\LoaderInterface;

final class TwigEngine extends Engine
{
    /**
     * @var Environment
     */
    private Environment $env;

    /**
     * @param LoaderInterface $loader
     */
    public function __construct(LoaderInterface $loader)
    {
        $this->env = new Environment($loader);
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $name, array $vars): TwigView
    {
        return new TwigView($this->env, $name, $vars);
    }
}
