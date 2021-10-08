<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Purify;

use Helix\Config\Purify\Attribute\Purify;
use Helix\Config\Purify\Attribute\Reader;

final class Purifier
{
    /**
     * @var non-empty-string
     */
    final public const DEFAULT_REPLACEMENT = '<hidden>';

    /**
     * @param array<non-empty-string> $hidden List of hidden fields
     * @param non-empty-string $replacement Hidden field replacement string
     */
    public function __construct(
        private array $hidden = [],
        private string $replacement = self::DEFAULT_REPLACEMENT,
    ) {}

    /**
     * @param Purify $attr
     * @return static
     */
    public static function fromAttribute(Purify $attr): self
    {
        return new self($attr->fields, $attr->replacement);
    }

    /**
     * @param object $context
     * @return static
     */
    public static function fromObject(object $context): self
    {
        $attribute = (new Reader())->read(new \ReflectionClass($context));

        return self::fromAttribute($attribute ?? new Purify());
    }

    /**
     * @param object $object
     * @param bool $caseInsensitive
     * @return array<non-empty-string, mixed>
     */
    public function cleanObject(object $object, bool $caseInsensitive = true): array
    {
        /** @psalm-suppress ArgumentTypeCoercion */
        return $this->clean(\get_object_vars($object), $caseInsensitive);
    }

    /**
     * @param array<non-empty-string, mixed> $fields
     * @param bool $caseInsensitive
     * @return array<non-empty-string, mixed>
     */
    public function clean(array $fields, bool $caseInsensitive = true): array
    {
        if ($this->hidden === []) {
            return $fields;
        }

        $result = [];

        /** @psalm-suppress MixedAssignment */
        foreach ($fields as $field => $value) {
            $source = $field;

            if ($caseInsensitive) {
                /** @psalm-suppress RedundantCastGivenDocblockType */
                $field = \strtolower((string)$field);
            }

            if (\in_array($field, $this->hidden, true)) {
                $value = $this->replacement;
            }

            /**
             * @psalm-suppress MixedAssignment
             * @psalm-suppress MixedArgumentTypeCoercion
             */
            $result[$source] = match (true) {
                \is_array($value) => $this->clean($value, $caseInsensitive),
                \is_object($value) => $this->cleanObject($value, $caseInsensitive),
                default => $value,
            };
        }

        return $result;
    }
}
