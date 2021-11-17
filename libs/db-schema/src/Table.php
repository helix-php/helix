<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Schema;

use Helix\Contracts\Database\ConnectionInterface;

abstract class Table implements TableInterface
{
    /**
     * @param ConnectionInterface $db
     * @param SchemaInterface $schema
     * @param non-empty-string $name
     */
    public function __construct(
        protected readonly ConnectionInterface $db,
        protected readonly SchemaInterface $schema,
        protected readonly string $name,
    ) {}

    /**
     * @return SchemaInterface
     */
    public function getSchema(): SchemaInterface
    {
        return $this->schema;
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function exists(): bool
    {
        foreach ($this->schema->tables() as $table) {
            if ($table->getName() === $this->name) {
                return true;
            }
        }

        return false;
    }
}
