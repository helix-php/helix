<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Pool;

/**
 * @template TReference of object
 * @template TEntry of object
 *
 * @template-extends Pool<TReference, TEntry>
 */
class MasterPool extends Pool implements MasterPoolInterface
{
    /**
     * @return object
     */
    protected function getReferenceForMasterEntry(): object
    {
        return $this->active;
    }

    /**
     * {@inheritDoc}
     */
    public function get(?object $reference = null): object
    {
        // Use constant reference as connection relation when the master object
        // of the pool is required.
        if ($reference === null) {
            $reference = $this->getReferenceForMasterEntry();
        }

        return parent::get($reference);
    }
}
