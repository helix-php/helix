<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database;

use Helix\Config\Purify\Attribute\Purify;
use Helix\Config\Purify\Purifier;

#[Purify(field: ['pwd', 'password'])]
abstract class ConnectionInfo
{
    /**
     * @var array
     */
    public readonly array $options;

    /**
     * @param non-empty-string|null $user
     * @param string|null $password
     * @param array $options
     */
    public function __construct(
        public readonly ?string $user = null,
        public readonly ?string $password = null,
        array $options = [],
    ) {
        $this->options = \array_merge([...$this->getDefaultOptions()], $options);
    }

    /**
     * @return iterable
     */
    protected function getDefaultOptions(): iterable
    {
        return [];
    }

    /**
     * @return array
     */
    public function __debugInfo(): array
    {
        return Purifier::fromObject($this)
            ->cleanObject($this)
        ;
    }
}
