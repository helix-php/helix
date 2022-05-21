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
use Helix\Contracts\Mime\TypeInterface;

enum Type: string implements TypeInterface
{
    //<cases>

    /**
     * @param non-empty-string $name
     * @return TypeInterface
     */
    public static function create(string $name): TypeInterface
    {
        /**
         * Local identity map for CustomType objects.
         *
         * @var array<non-empty-lowercase-string, CustomType> $memory
         */
        static $memory = [];

        $lower = \strtolower($name);

        return self::tryFrom($lower)
            ?? $memory[$lower]
            ??= CustomType::create($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        $info = $this->getInfo();

        return $info->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getCategory(): CategoryInterface
    {
        $info = $this->getInfo();

        return $info->category;
    }

    /**
     * @return Info
     */
    private function getInfo(): Info
    {
        /**
         * Local identity map for Info metadata objects.
         *
         * @var array<non-empty-string, Info> $memory
         */
        static $memory = [];

        if (isset($memory[$this->name])) {
            return $memory[$this->name];
        }

        $attributes = (new \ReflectionEnumBackedCase(self::class, $this->name))
            ->getAttributes(Info::class);

        if (isset($attributes[0])) {
            return $memory[$this->name] = $attributes[0]->newInstance();
        }

        throw new \LogicException('Could not load MIME type [' . $this->name . '] info');
    }
}
