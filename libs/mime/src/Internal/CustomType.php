<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Mime\Internal;

use Helix\Contracts\Mime\CategoryInterface;
use Helix\Contracts\Mime\TypeInterface;
use Helix\Mime\Category;
use Helix\Mime\Type;

/**
 * @internal Helix\Mime\Internal\CustomType is an internal library class, please
 *           do not use it in your code.
 * @psalm-internal Helix\Mime\Internal
 */
final class CustomType implements TypeInterface
{
    /**
     * @var non-empty-string
     */
    private const EMPTY_MIME_TYPE = 'example';

    /**
     * @internal Please use {@see Type::parse()} factory method instead.
     *
     * @param non-empty-string $name
     * @param CategoryInterface $category
     */
    public function __construct(
        private readonly string $name,
        private readonly CategoryInterface $category,
    ) {
    }

    /**
     * @param non-empty-string $mime
     * @return TypeInterface
     */
    public static function fromString(string $mime): TypeInterface
    {
        $position = \strpos($mime, '/');

        return match ($position) {
            false => new self(
                name: $mime ?: self::EMPTY_MIME_TYPE,
                category: Category::EXAMPLE,
            ),
            0 => new self(
                name: \substr($mime, 1) ?: self::EMPTY_MIME_TYPE,
                category: Category::EXAMPLE,
            ),
            \strlen($mime) - 1 => new self(
                name: self::EMPTY_MIME_TYPE,
                category: Category::create(\substr($mime, 0, -1)),
            ),
            default => new self(
                name: \substr($mime, $position + 1),
                category: Category::create(\substr($mime, 0, $position)),
            )
        };
    }

    /**
     * {@inheritDoc}
     */
    public function getFullName(): string
    {
        $category = $this->getCategory();

        return $category->getName() . '/' . $this->getName();
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getCategory(): CategoryInterface
    {
        return $this->category;
    }
}
