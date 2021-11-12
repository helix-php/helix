<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View;

use Helix\Contracts\View\VariablesAwareInterface;

/**
 * @mixin VariablesAwareInterface
 */
trait VariablesAwareTrait
{
    /**
     * @var array<non-empty-string, mixed>
     */
    protected array $vars = [];

    /**
     * @param iterable<non-empty-string, mixed> $vars
     */
    protected function addMany(iterable $vars = []): self
    {
        foreach ($vars as $variable => $value) {
            $this->vars[$variable] = $value;
        }

        return $this;
    }

    /**
     * @param iterable<non-empty-string, mixed> $vars
     * @return array<non-empty-string, mixed>
     */
    protected function getVariables(iterable $vars): array
    {
        $result = $this->vars;

        foreach ($vars as $name => $value) {
            $result[$name] = $value;
        }

        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function add(string $variable, mixed $value): self
    {
        $this->vars[$variable] = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function has(string $variable): bool
    {
        /**
         * Note: PHP Opcode optimisation
         * @see https://www.php.net/manual/pt_BR/internals2.opcodes.isset-isempty-var.php
         *
         * Priority use `ZEND_ISSET_ISEMPTY_VAR !0` opcode instead of `DO_FCALL 'array_key_exists'`.
         */
        return isset($this->vars[$variable]) || \array_key_exists($variable, $this->vars);
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $variable, mixed $default = null): mixed
    {
        if ($this->has($variable)) {
            return $this->vars[$variable];
        }

        return $default;
    }
}
