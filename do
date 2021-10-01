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

require __DIR__ . '/vendor/autoload.php';

\set_time_limit(0);

$app = new Application(new CreateInfo(
    // Configuration
    path: __DIR__,

    // Extensions list
    extensions: require __DIR__ . '/resources/config/extensions.php',
));

$app->run();
