<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Schema\SQLite;

use Helix\Database\Schema\Schema as BaseSchema;
use Helix\Database\Schema\TableInterface;

final class Schema extends BaseSchema
{
    /**
     * {@inheritDoc}
     */
    public function tables(): iterable
    {
        $query = $this->db->execute(
            <<<SQL
            SELECT `name` FROM `sqlite_master`
            WHERE `type` = 'table'
            ORDER BY `name` ASC
        SQL
        );

        foreach ($query as ['name' => $name]) {
            if ($this->isSystemTable($name)) {
                continue;
            }

            yield $this->table($name);
        }
    }

    /**
     * @param non-empty-string $name
     * @return bool
     */
    private function isSystemTable(string $name): bool
    {
        if (\in_array($name, ['sqlite_master', 'sqlite_sequence'], true)) {
            return true;
        }

        return \str_starts_with($name, 'sqlite_stat') && $this->isDigit(\substr($name, 11));
    }

    /**
     * @param string $text
     * @return bool
     */
    private function isDigit(string $text): bool
    {
        if (\function_exists('\\ctype_digit')) {
            return \ctype_digit($text);
        }

        foreach (\str_split($text) as $char) {
            $code = \ord($char);
            $isDigit = $code >= \ord('0') && $code <= \ord('9');

            if (!$isDigit) {
                return false;
            }
        }

        return true;


        $code = \ord($char);

        return $code >= \ord('0') && $code <= \ord('9');
    }

    /**
     * @param string $name
     * @return TableInterface
     */
    public function table(string $name): TableInterface
    {
        return new Table($this->db, $this, $name);
    }
}
