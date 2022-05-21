<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\StatusCode;

use Helix\Contracts\Http\StatusCode\CategoryInterface;
use Helix\Contracts\Http\StatusCode\StatusCodeInterface;

/**
 * @internal Helix\Http\StatusCode\CustomStatusCode is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Http\StatusCode
 */
final class CustomStatusCode implements StatusCodeInterface
{
    /**
     * @var CategoryInterface
     */
    private CategoryInterface $category;

    /**
     * @internal Please use {@see StatusCode::create()} method instead.
     *
     * @param positive-int|0 $code
     * @param string $reasonPhrase
     * @param CategoryInterface|null $category
     */
    public function __construct(
        private readonly int $code,
        private string $reasonPhrase = '',
        CategoryInterface $category = null,
    ) {
        $this->category = $category ?? Category::parse($this->code);
    }

    /**
     * @param string $reasonPhrase
     * @return $this
     */
    public function withReasonPhrase(string $reasonPhrase): self
    {
        $self = clone $this;
        $self->reasonPhrase = $reasonPhrase;

        return $self;
    }

    /**
     * @psalm-immutable
     * @param CategoryInterface $category
     * @return $this
     */
    public function withCategory(CategoryInterface $category): self
    {
        $self = clone $this;
        $self->category = $category;

        return $self;
    }

    /**
     * {@inheritDoc}
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * {@inheritDoc}
     */
    public function getReasonPhrase(): string
    {
        return $this->reasonPhrase;
    }

    /**
     * {@inheritDoc}
     */
    public function getCategory(): CategoryInterface
    {
        return $this->category;
    }
}
