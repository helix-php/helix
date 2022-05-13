<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Reader;

use Helix\Config\Exception\NotLoadableException;

class PhpReader extends Reader
{
    /**
     * @var non-empty-string
     */
    protected const ERROR_LOADING = 'An error occurred while loading PHP configuration file: %s';

    /**
     * @var non-empty-string
     */
    protected const ERROR_SIDE_EFFECT = 'Configuration file "%s" contains side effect (stdout output): "%s"';

    /**
     * {@inheritDoc}
     */
    public function fromFile(string $pathname): array
    {
        $this->assertFileLoadable($pathname);

        \ob_start();

        try {
            /** @psalm-suppress UnresolvableInclude */
            $result = require $pathname;
        } catch (\Throwable $e) {
            \ob_end_clean();

            $message = \sprintf(static::ERROR_LOADING, $e->getMessage());
            throw new NotLoadableException($message, (int)$e->getCode(), $e);
        }

        if ($output = \ob_get_clean()) {
            throw new NotLoadableException(\sprintf(static::ERROR_SIDE_EFFECT, $pathname, $output));
        }

        return (array)$result;
    }

    /**
     * {@inheritDoc}
     */
    public function fromString(string $data): array
    {
        $message = 'Reader %s does not support loading from string';

        throw new NotLoadableException(\sprintf($message, static::class));
    }
}
