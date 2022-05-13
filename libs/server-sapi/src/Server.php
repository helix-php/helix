<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server\Sapi;

use Helix\Contracts\ErrorHandler\Http\HttpErrorHandlerInterface;
use Helix\Http\Psr17FactoryInterface;
use Helix\Server\ExternalServer;
use Helix\Server\Sapi\Internal\Emitter;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * @template-extends ExternalServer<ServerCreateInfo>
 */
class Server extends ExternalServer
{
    /**
     * @var Emitter
     */
    private Emitter $emitter;

    /**
     * @param Psr17FactoryInterface $factory
     * @param ServerCreateInfo $info
     */
    public function __construct(Psr17FactoryInterface $factory, ServerCreateInfo $info)
    {
        parent::__construct($factory, $info);

        $this->emitter = new Emitter($info->emitter);
    }

    /**
     * @param string $index
     * @return bool
     */
    public static function isBuiltinServerFile(string $index): bool
    {
        if (\PHP_SAPI === 'cli-server') {
            $uri = \urldecode(\parse_url((string)$_SERVER['REQUEST_URI'], \PHP_URL_PATH));
            $path = \realpath(\dirname($index) . $uri);

            if (\is_string($path) && $path !== $index && \is_file($path)) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function run(RequestHandlerInterface $handler, HttpErrorHandlerInterface $error = null): void
    {
        try {
            $request = $this->factory->createServerRequest(
                $this->normalizeMethod($this->info->server),
                $this->normalizeUri($this->info->server),
                $this->info->server,
            );

            $this->emitter->emit($handler->handle($request));
        } catch (\Throwable $e) {
            if ($error !== null) {
                $this->emitter->emit($error->throw($e, $request ?? null));
            } else {
                throw $e;
            }
        }
    }
}
