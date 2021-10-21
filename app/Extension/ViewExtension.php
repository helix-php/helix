<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Extension;

use Helix\Boot\Attribute\Singleton;
use Helix\Contracts\View\FactoryInterface;
use Helix\Foundation\Path;
use Helix\View\Factory;
use Twig\Loader\FilesystemLoader;

final class ViewExtension
{
    #[Singleton(as: [Factory::class])]
    public function getViewFactory(Path $path): FactoryInterface
    {
        return new Factory([
            'php'  => new \Helix\View\Engine\Php\PhpEngine($path->views),
            'twig' => new \Helix\View\Engine\Twig\TwigEngine(
                new FilesystemLoader($path->views),
            ),
        ]);
    }
}
