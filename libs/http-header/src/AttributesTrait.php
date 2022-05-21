<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\Header;

use Helix\Contracts\Http\Header\Attribute\AttributeInterface;
use Helix\Contracts\Http\Header\Attribute\FlagInterface;
use Helix\Contracts\Http\Header\ProvidesAttributesInterface;
use Helix\Contracts\Http\Header\ValueInterface;

/**
 * @mixin ProvidesAttributesInterface
 * @psalm-require-implements ProvidesAdditionalAttributesInterface
 */
trait AttributesTrait
{
    /**
     * @var array<FlagInterface>
     */
    protected array $attributes = [];

    /**
     * @return array<array-key, FlagInterface>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Updates an additional attributes of the {@see ValueInterface} object.
     *
     * @param iterable<FlagInterface> $attributes
     * @return void
     */
    public function setAttributes(iterable $attributes): void
    {
        $this->attributes = [];
        $this->addAttributes($attributes);
    }

    /**
     * Updates an additional attributes of the {@see ValueInterface} object.
     *
     * @param iterable<FlagInterface> $attributes
     * @return void
     */
    public function addAttributes(iterable $attributes): void
    {
        foreach ($attributes as $attr) {
            if (!$attr instanceof FlagInterface) {
                $message = 'Header attr must be an instance of %s or %s, but %s given';
                $message = \sprintf($message, AttributeInterface::class, FlagInterface::class, \get_debug_type($attr));

                throw new \InvalidArgumentException($message);
            }

            $this->attributes[\strtolower($attr->getName())] = $attr;
        }
    }

    /**
     * Immutable equivalent of the {@see SetCookie::setAttributes()} method.
     *
     * @psalm-immutable
     * @param iterable<FlagInterface> $attributes
     * @return self
     */
    public function withAttributes(iterable $attributes): self
    {
        $self = clone $this;
        $self->setAttributes($attributes);

        return $self;
    }

    /**
     * Immutable equivalent of the {@see SetCookie::addAttributes()} method.
     *
     * @psalm-immutable
     * @param iterable<FlagInterface> $attributes
     * @return self
     */
    public function withAddedAttributes(iterable $attributes): self
    {
        $self = clone $this;
        $self->addAttributes($attributes);

        return $self;
    }
}
