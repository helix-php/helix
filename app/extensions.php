<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

return [
    //
    // Kernel Extensions
    //
    \Helix\Foundation\Extension\ConfigExtension::class,
    \Helix\Foundation\Extension\ClockExtension::class,
    \Helix\Foundation\Http\Extension\HttpExtension::class,
    \Helix\Foundation\Http\Extension\SessionExtension::class,
    \Helix\Foundation\Http\Extension\ViewExtension::class,
    \Helix\Bridge\Monolog\MonologExtension::class,
    \Helix\Bridge\Cache\CacheExtension::class,
    \Helix\Bridge\Doctrine\DoctrineExtension::class,
    \Helix\Bridge\Twig\TwigExtension::class,

    //
    // Debug Extensions
    //
    \Helix\Debug\DebugExtension::class => (bool)env('APP_DEBUG'),

    //
    // Application Extensions
    //
    \App\Extension\RouterExtension::class,
    \App\Extension\ServerExtension::class,
    \App\Extension\ConsoleExtension::class,
];
