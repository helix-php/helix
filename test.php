<?php

use Helix\Database\PDO\SQLite\Driver;
use Helix\Database\PDO\SQLite\FileConnectionInfo;
use Helix\Database\Schema\SQLite\Schema;

require __DIR__ . '/vendor/autoload.php';

$driver = new Driver(
    new FileConnectionInfo(
        path: __DIR__ . '/sqlite.db'
    )
);

$connection = $driver->connect();

$schema = new Schema($connection);

foreach ($schema->tables() as $table) {
    echo $table->getName() . "\n";
    foreach ($table->columns() as $column) {
        echo ' - ' . $column->getName() . "\n";
    }
}
