<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database\Transaction;

use Helix\Contracts\Database\Transaction\IsolationLevelInterface;

enum IsolationLevel: string implements IsolationLevelInterface
{
    /**
     * Transactions are not isolated from each other. If the DBMS supports other
     * transaction isolation levels, it ignores whatever mechanism it uses to
     * implement those levels. So that they do not adversely affect other
     * transactions, transactions running at the Read Uncommitted level are
     * usually read-only.
     *
     * @var non-empty-string
     */
    case READ_UNCOMMITTED = 'READ UNCOMMITTED';

    /**
     * The transaction waits until rows write-locked by other transactions are
     * unlocked; this prevents it from reading any "dirty" data.
     *
     * The transaction holds a read lock (if it only reads the row) or write
     * lock (if it updates or deletes the row) on the current row to prevent
     * other transactions from updating or deleting it. The transaction releases
     * read locks when it moves off the current row. It holds write locks until
     * it is committed or rolled back.
     *
     * @var non-empty-string
     */
    case READ_COMMITTED = 'READ COMMITTED';

    /**
     * The transaction waits until rows write-locked by other transactions are
     * unlocked; this prevents it from reading any "dirty" data.
     *
     * The transaction holds read locks on all rows it returns to the
     * application and write locks on all rows it inserts, updates, or deletes.
     * For example, if the transaction includes the SQL statement
     * `SELECT * FROM orders`, the transaction read-locks rows as the
     * application fetches them. If the transaction includes the SQL
     * statement `DELETE FROM orders WHERE status = 'CLOSED'`, the transaction
     * write-locks rows as it deletes them.
     *
     * Because other transactions cannot update or delete these rows, the
     * current transaction avoids any non-repeatable reads. The transaction
     * releases its locks when it is committed or rolled back.
     *
     * @var non-empty-string
     */
    case REPEATABLE_READ = 'REPEATABLE READ';

    /**
     * The transaction waits until rows write-locked by other transactions are
     * unlocked; this prevents it from reading any "dirty" data.
     *
     * The transaction holds a read lock (if it only reads rows) or write lock
     * (if it can update or delete rows) on the range of rows it affects. For
     * example, if the transaction includes the SQL statement
     * `SELECT * FROM orders`, the range is the entire "orders" table; the
     * transaction read-locks the table and does not allow any new rows to be
     * inserted into it. If the transaction includes the SQL statement
     * `DELETE FROM orders WHERE status = 'CLOSED'`, the range is all rows with
     * a "status" of "CLOSED"; the transaction write-locks all rows in the
     * "orders" table with a "status" of "CLOSED" and does not allow any rows to
     * be inserted or updated such that the resulting row has a "status" of
     * "CLOSED".
     *
     * Because other transactions cannot update or delete the rows in the range,
     * the current transaction avoids any non-repeatable reads. Because other
     * transactions cannot insert any rows in the range, the current transaction
     * avoids any phantoms. The transaction releases its lock when it is
     * committed or rolled back.
     */
    case SERIALIZABLE = 'SERIALIZABLE';

    /**
     * @return Info
     */
    private function getInfo(): Info
    {
        $attributes = (new \ReflectionEnumBackedCase(self::class, $this->name))
            ->getAttributes(Info::class);

        if (isset($attributes[0])) {
            return $attributes[0]->newInstance();
        }

        return new Info();
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->value;
    }

    /**
     * A dirty read occurs when a transaction reads data that has not yet been
     * committed. For example, suppose transaction 1 updates a row. Transaction
     * 2 reads the updated row before transaction 1 commits the update. If
     * transaction 1 rolls back the change, transaction 2 will have read data
     * that is considered never to have existed.
     *
     * @return bool
     */
    public function isDirtyReads(): bool
    {
        $info = $this->getInfo();

        return $info->dirtyReads;
    }

    /**
     * A non-repeatable read occurs when a transaction reads the same row twice
     * but gets different data each time. For example, suppose transaction 1
     * reads a row. Transaction 2 updates or deletes that row and commits the
     * update or delete. If transaction 1 rereads the row, it retrieves
     * different row values or discovers that the row has been deleted.
     *
     * @return bool
     */
    public function isNonRepeatableReads(): bool
    {
        $info = $this->getInfo();

        return $info->nonRepeatableReads;
    }

    /**
     * A phantom is a row that matches the search criteria but is not initially
     * seen. For example, suppose transaction 1 reads a set of rows that satisfy
     * some search criteria. Transaction 2 generates a new row (through either
     * an update or an insert) that matches the search criteria for
     * transaction 1. If transaction 1 reexecutes the statement that reads the
     * rows, it gets a different set of rows.
     *
     * @return bool
     */
    public function isPhantoms(): bool
    {
        $info = $this->getInfo();

        return $info->phantoms;
    }
}
