<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\ParamResolver\Metadata\Type;

interface TerminalTypeInterface extends TypeInterface
{
    /**
     * @return non-empty-string
     */
    public function getName(): string;

    /**
     * @return bool
     */
    public function isBuiltin(): bool;

    /**
     * @return bool
     */
    public function isInternal(): bool;
}
