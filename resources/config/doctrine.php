<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/** @var \Helix\Foundation\Path $path */

return [
    'debug' => (bool)env('APP_DEBUG'),

    'entities' => [$path->app('Entity')],

    'repositories' => [
        \App\Entity\Article\ArticleRepositoryInterface::class => \App\Entity\Article::class,
        \App\Entity\Article\DatabaseArticleRepository::class => \App\Entity\Article::class,
    ],

    'connection' => [
        'driver' => 'pdo_sqlite',
        'path'   => __DIR__ . '/../database/db.sqlite',
    ]
];
