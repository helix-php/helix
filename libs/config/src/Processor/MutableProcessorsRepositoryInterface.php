<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config\Processor;

interface MutableProcessorsRepositoryInterface extends ProcessorsRepositoryInterface
{
    /**
     * @param ProcessorInterface $processor
     * @return void
     */
    public function add(ProcessorInterface $processor): void;
}
