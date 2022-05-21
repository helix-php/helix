<?php

require __DIR__ . '/../../../vendor/autoload.php';

function csv(string $file): iterable
{
    $fp = \fopen($file, 'rb+');

    while (!feof($fp)) {
        $record = \fgetcsv($fp);

        // Is EOI
        if (!\is_array($record) || !isset($record[2])) {
            continue;
        }

        [$name, $tpl, $ref] = $record;

        // Ignore titles
        if ($name === 'Name' || $tpl === 'Template' || $ref === 'Reference') {
            continue;
        }

        yield $tpl;
    }

    \fclose($fp);
}

$header = <<<'HEADER'
<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Mime;

enum Type: string
{
HEADER;



$footer = <<<'FOOTER'
}

FOOTER;

$body = '';

\file_put_contents(__DIR__ . '/../src/Type.php', $header . $body . $footer);
