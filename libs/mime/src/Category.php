<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Mime;

use Helix\Contracts\Mime\CategoryInterface;

enum Category: string implements CategoryInterface
{
    case APPLICATION = 'application';
    case AUDIO = 'audio';
    case FONT = 'font';
    case EXAMPLE = 'example';
    case IMAGE = 'image';
    case MESSAGE = 'message';
    case MODEL = 'model';
    case MULTIPART = 'multipart';
    case TEXT = 'text';
    case VIDEO = 'video';

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->value;
    }

    /**
     * @return iterable<non-empty-string>
     */
    public static function names(): iterable
    {
        $map = static fn (CategoryInterface $category): string => $category->getName();

        return \array_map($map, self::cases());
    }

    /**
     * @param non-empty-string $category
     * @return CategoryInterface
     */
    public static function create(string $category): CategoryInterface
    {
        /**
         * Local identity map for custom mime categories.
         *
         * @var array<non-empty-string, CustomCategory> $memory
         */
        static $memory = [];

        $category = \strtolower($category);

        return self::tryFrom($category)
            ?? $memory[$category]
            ??= new CustomCategory($category)
        ;
    }
}
