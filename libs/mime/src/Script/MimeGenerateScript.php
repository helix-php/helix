<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Mime\Script;

use Composer\IO\IOInterface;
use Composer\Script\Event;

/**
 * @internal Helix\Mime\Script\MimeGenerateScript is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Mime\Script
 */
final class MimeGenerateScript extends Script
{
    private const SPEC_DIRECTORY_GLOB = __DIR__ . '/../../resources/spec/*.csv';
    private const SPEC_TEMPLATE = __DIR__ . '/../../resources/template.php';
    private const SPEC_OUTPUT = __DIR__ . '/../../src/Type.php';

    public static function run(Event $e): void
    {
        self::requireAutoloader();

        $result = '';

        foreach (self::cases($e->getIO()) as $case) {
            $result .= $case . "\n";
        }

        $template = \file_get_contents(self::SPEC_TEMPLATE);

        \file_put_contents(self::SPEC_OUTPUT, \str_replace('//<cases>', \trim($result), $template));
    }

    private static function cases(IOInterface $io): iterable
    {
        $types = self::read($io);

        foreach ($types as $mime => $category) {
            $case = \strtoupper(\preg_replace('/(\W+)/ium', '_', $mime));

            yield \sprintf(<<<'TEMPLATE'

                /**
                 * @link https://www.iana.org/assignments/media-types/%s
                 */
                #[Info(name: '%1$s', category: Category::%s)]
                case %s = '%s';
            TEMPLATE, $mime, \strtoupper($category), $case, \strtolower($mime));
        }

        return [];
    }

    private static function read(IOInterface $io): array
    {
        $result = [];

        foreach (\glob(self::SPEC_DIRECTORY_GLOB) as $file) {
            $category = \pathinfo($file, \PATHINFO_FILENAME);

            $io->write($prefix = '- Reading from <comment>'
                . ($file = \realpath($file)) . '</comment>: ', false);

            $i = 0;
            foreach (self::csv($file) as $name => $mime) {
                if (!$mime) {
                    $mime = $category . '/' . $name;
                }

                $io->overwrite($prefix . $mime, false);
                $result[$mime] = $category;
                ++$i;
            }

            $io->overwrite($prefix . '<info>Done</info>');
            $io->write('  Loaded <info>' . $i . '</info> mime types');
        }

        return $result;
    }

    private static function csv(string $file): iterable
    {
        $fp = \fopen($file, 'rb+');

        while (!feof($fp)) {
            // Skip empty records
            if (!\is_array($payload = \fgetcsv($fp))) {
                continue;
            }

            [$name, $tpl, $ref] = $payload;

            // Skip titles
            if ($name === 'Name' || $tpl === 'Template' || $ref === 'Reference') {
                continue;
            }

            yield $name => $tpl;
        }

        \fclose($fp);
    }
}
