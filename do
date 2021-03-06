#!/usr/bin/env php
<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Helix\Foundation\Console\Application;
use Helix\Foundation\Console\CreateInfo;

require __DIR__ . '/app/bootstrap.php';

set_time_limit(0);

/**
 * Check SAPI
 */
if (!in_array(PHP_SAPI, ['cli', 'phpdbg', 'embed'], true)) {
    throw new \LogicException(
        'Warning: The console should be invoked via the CLI '
        . 'version of PHP, not the ' . PHP_SAPI . ' SAPI'
    );
}

$app = new Application(new CreateInfo(
    debug: (bool)env('APP_DEBUG'),
    env: env('APP_ENV', 'prod'),
    path: __DIR__,
    extensions: require __DIR__ . '/app/extensions.php',
));


exit($app->run());
