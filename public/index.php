<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Helix\Foundation\Http\Application;
use Helix\Foundation\Http\CreateInfo;
use Helix\Server\Sapi\Server as SapiServer;

require __DIR__ . '/../app/bootstrap.php';

/**
 * Decline static file requests back to the PHP built-in webserver.
 */
if (\class_exists(SapiServer::class) && SapiServer::isBuiltinServerFile(__FILE__)) {
    return false;
}

$app = new Application(new CreateInfo(
    // Application handlers
    handler: \App\Http\Kernel::class,
    errors: \App\Http\ErrorHandler::class,

    // Configuration
    path: \dirname(__DIR__),

    // Extensions list
    extensions: require __DIR__ . '/../resources/config/extensions.php',
));

$app->run();
