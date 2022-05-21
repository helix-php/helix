<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Mime\Script;

use Composer\Script\Event;
use Helix\Contracts\Mime\CategoryInterface;
use Helix\Mime\Category;

/**
 * @internal Helix\Mime\Script\MimeUpdateScript is an internal library class, please do not use it in your code.
 * @psalm-internal Helix\Mime\Script
 */
final class MimeUpdateScript
{
    private const ERROR_DOWNLOADING = 'An error occurred while downloading "%s"';

    private const IANA_MIME_URI_TEMPLATE = 'https://www.iana.org/assignments/media-types/%s.csv';
    private const OUTPUT_TEMPLATE = __DIR__ . '/../../resources/spec/%s.csv';

    public static function run(Event $e): void
    {
        $io = $e->getIO();

        foreach (Category::cases() as $category) {
            $io->write('- Updating [<info>' . $category->getName() . '</info>]');

            $source = self::getSpecUri($category);
            $target = self::getOutputDirectory($category);
            $result = @\fopen($source, 'rb', context: \stream_context_create([
                'http' => [
                    'method' => 'GET',
                    'header' => \implode("\n", [
                        'User-Agent: Helix MIME Downloader',
                    ]),
                ],
            ]));

            if (!$result) {
                $io->error(\sprintf(self::ERROR_DOWNLOADING, $category->getName()));
                continue;
            }

            $io->overwrite('- Copying  [<info>' . $category->getName() . '</info>] into <comment>' . $target . '</comment>');
            \stream_copy_to_stream($result, \fopen($target, 'ab+'));
            $io->overwrite('- Updated  [<info>' . $category->getName() . '</info>]');
        }
    }

    private static function getOutputDirectory(CategoryInterface $category): string
    {
        return \sprintf(self::OUTPUT_TEMPLATE, $category->getName());
    }

    private static function getSpecUri(CategoryInterface $category): string
    {
        return \sprintf(self::IANA_MIME_URI_TEMPLATE, $category->getName());
    }
}
