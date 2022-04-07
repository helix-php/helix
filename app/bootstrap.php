<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

$autoload = require __DIR__ . '/../vendor/autoload.php';

define('HELIX_START', microtime(true));

ini_set('date.timezone', 'UTC');

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

/**
 * Load environment variables from `.env` file if exists.
 */
if (class_exists(Dotenv\Dotenv::class) && is_file(__DIR__ . '/../.env')) {
    $dotenv = \Dotenv\Dotenv::createUnsafeImmutable(dirname(__DIR__));
    $dotenv->load();
}

return $autoload;
