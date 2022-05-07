<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Env;

use Dotenv\Dotenv;

final class Environment
{
    /**
     * @var Environment|null
     */
    private static ?self $current = null;

    /**
     * @param array<non-empty-string, mixed> $variables
     */
    private function __construct(
        private readonly array $variables
    ) {
    }

    /**
     * @return bool
     */
    public static function loaded(): bool
    {
        return self::$current !== null;
    }

    /**
     * @return self
     */
    public static function current(): self
    {
        return self::$current ??= self::create();
    }

    /**
     * @psalm-taint-sink file $files
     * @param iterable<non-empty-string>|non-empty-string $files
     * @return static
     */
    public static function dotenv(iterable|string $files): self
    {
        if (\is_string($files)) {
            $files = [$files];
        }

        foreach ($files as $file) {
            if (!\is_file($file)) {
                continue;
            }

            $dotenv = Dotenv::createUnsafeMutable(\dirname($file), \basename($file));
            $dotenv->load();
        }

        return self::$current = self::create();
    }

    /**
     * @param non-empty-string $name
     * @param mixed|null $default
     * @return mixed
     */
    public static function get(string $name, mixed $default = null): mixed
    {
        $instance = isset($this) ? $this : self::current();

        if (isset($instance->variables[$name]) || \array_key_exists($name, $instance->variables)) {
            return $instance->variables[$name];
        }

        return $default;
    }

    /**
     * @param iterable<non-empty-string, mixed> $variables
     * @return iterable<non-empty-string, mixed>
     */
    protected static function map(iterable $variables): iterable
    {
        foreach ($variables as $key => $value) {
            yield $key => self::convert($value);
        }
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    protected static function convert(mixed $value): mixed
    {
        if (!\is_string($value)) {
            return $value;
        }

        return match (\strtolower($value)) {
            'true', '(true)' => true,
            'false', '(false)' => false,
            'empty', '(empty)' => '',
            'null', '(null)' => null,
            default => (
                static fn () => \preg_match('/\A([\'"])(.*)\1\z/', $value, $matches)
            && $matches !== [] ? $matches[2] : $value
            )()
        };
    }

    /**
     * @return static
     */
    private static function create(): self
    {
        return new self([...self::map($_SERVER ?? $_ENV)]);
    }
}
