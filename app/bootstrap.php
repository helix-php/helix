<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Helix\Env\Environment;

$autoload = require __DIR__ . '/../vendor/autoload.php';

ini_set('date.timezone', 'UTC');

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

/**
 * Load environment variables from .env.
 */
Environment::dotenv(__DIR__ . '/../.env');

return $autoload;
