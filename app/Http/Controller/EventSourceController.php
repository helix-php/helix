<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controller;

use Helix\Async\Task;
use Helix\Http\EventSourceResponse;
use Helix\Router\Attribute\Route;
use Psr\Http\Message\ResponseInterface;

class EventSourceController
{
    #[Route('/stream')]
    public function listen(): ResponseInterface
    {
        $delta = \microtime(true);

        return new EventSourceResponse(static function () use ($delta): \Generator {
            while (Task::tick(true)) {
                yield 'ping' => \json_encode([
                    'alive'  => \number_format(\microtime(true) - $delta, 10),
                    'memory' => \number_format(\memory_get_usage() / 1000, 2),
                    'date'   => (new \DateTime())->format(\DateTimeInterface::RFC3339_EXTENDED)
                ]);

                \usleep(1000000);
            }
        });
    }
}
