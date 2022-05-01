<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata\Type;

final class Type implements TerminalTypeInterface
{
    /**
     * @psalm-var non-empty-list<non-empty-string> & non-empty-list<lowercase-string>
     */
    private const BUILT_IN_TYPES = [
        'int',
        'float',
        'string',
        'bool',
        'callable',
        'array',
        'iterable',
        'object',
        'void',
        'mixed',
        'null',
        'never',
        'false',

        // @link https://externals.io/message/117500
        // @link https://wiki.php.net/rfc/true-type
        'true',
    ];

    /**
     * @psalm-var non-empty-list<non-empty-string> & non-empty-list<lowercase-string>
     */
    private const INTERNAL_TYPES = [
        'self',
        'static',
        'parent',
    ];

    /**
     * @psalm-var non-empty-list<non-empty-string> & non-empty-list<lowercase-string>
     */
    private const NULLABLE_TYPES = [
        'null',
        'mixed',
    ];

    /**
     * @psalm-var non-empty-string & lowercase-string
     */
    private readonly string $lower;

    /**
     * @var bool|null
     */
    private ?bool $internal = null;

    /**
     * @param non-empty-string $name
     * @param bool|null $builtin
     * @param bool|null $nullable
     */
    public function __construct(
        public readonly string $name,
        private ?bool $builtin = null,
        private ?bool $nullable = null,
    ) {
        $this->lower = \strtolower($this->name);
    }

    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isBuiltin(): bool
    {
        return $this->builtin ??= \in_array($this->lower, self::BUILT_IN_TYPES, true);
    }

    public function isInternal(): bool
    {
        return $this->internal ??= (
            $this->isBuiltin() || \in_array($this->lower, self::INTERNAL_TYPES, true)
        );
    }

    /**
     * @return static
     */
    public static function null(): self
    {
        return new self('null', true, true);
    }

    /**
     * @return static
     */
    public static function mixed(): self
    {
        return new self('mixed', true, true);
    }

    /**
     * {@inheritDoc}
     */
    public function isNullable(): bool
    {
        return $this->nullable ??= \in_array($this->lower, self::NULLABLE_TYPES, true);
    }
}
