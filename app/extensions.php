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
    \Helix\Foundation\Http\Extension\HttpExtension::class,
    \Helix\Bridge\Doctrine\DoctrineExtension::class,

    //
    // Debug Extensions
    //
    ...\array_filter([
        \Helix\Debug\DebugExtension::class,
    ], \class_exists(...)),


    //
    // Application Extensions
    //
    \App\Extension\CacheExtension::class,
    \App\Extension\RouterExtension::class,
    \App\Extension\ServerExtension::class,
    \App\Extension\LoggerExtension::class,
    \App\Extension\ViewExtension::class,
    \App\Extension\ConsoleExtension::class,
];
