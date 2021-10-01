<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Http;

use Helix\Container\Exception\RegistrationException;
use Helix\Contracts\Container\Exception\NotInstantiatableExceptionInterface;
use Helix\Contracts\ErrorHandler\ErrorHandlerInterface;
use Helix\Contracts\ErrorHandler\Http\HttpErrorHandlerInterface;
use Helix\Foundation\Application as BaseApplication;
use Helix\Server\ServerInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class Application extends BaseApplication
{
    /**
     * @param CreateInfo $info
     * @throws NotInstantiatableExceptionInterface
     * @throws RegistrationException
     */
    public function __construct(CreateInfo $info)
    {
        parent::__construct($info);

        $this->container->singleton($info->handler)
            ->as(RequestHandlerInterface::class)
        ;

        $this->container->singleton($info->errors)
            ->as(HttpErrorHandlerInterface::class, ErrorHandlerInterface::class)
        ;
    }

    /**
     * @return int
     * @throws \Throwable
     */
    public function run(): int
    {
        parent::run();

        $server = $this->container->get(ServerInterface::class);

        $fiber = new \Fiber(function () use ($server) {
            $requests = $this->container->get(RequestHandlerInterface::class);
            $errors = $this->container->get(HttpErrorHandlerInterface::class);

            $server->run($requests, $errors);

            return 0;
        });

        $fiber->start();

        while (! $fiber->isTerminated()) {
            $fiber->resume();
        }

        return (int)$fiber->getReturn();
    }
}
