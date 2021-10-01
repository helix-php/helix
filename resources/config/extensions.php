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
    \Helix\Foundation\Extension\LoggerExtension::class,

    //
    // HTTP Kernel Extensions
    //
    \Helix\Foundation\Http\Extension\HttpExtension::class,

    //
    // Console Kernel Extensions
    //
    \Helix\Foundation\Console\Extension\ConsoleCommandsExtension::class,

    //
    // Application Extensions
    //
    \App\Extension\RouterExtension::class,
    \App\Extension\ServerExtension::class,
    \App\Extension\LoggerExtension::class,
    \App\Extension\ViewExtension::class,
];
