<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Session\Http\Middleware;

use Helix\Clock\SystemClock;
use Helix\Session\Http\CookieFactory;
use Helix\Session\ManagerInterface;
use Helix\Session\SessionId;
use Helix\Session\SessionIdInterface;
use Psr\Clock\ClockInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * This middleware is responsible for injecting and updating a cookie with a
 * session ID.
 */
class StartSession implements MiddlewareInterface
{
    /**
     * @var non-empty-string
     */
    private const DEFAULT_SESSION_NAME = 'helix_session';

    /**
     * @var CookieFactory
     */
    private readonly CookieFactory $factory;

    /**
     * @param ManagerInterface $manager
     * @param string $name
     * @param positive-int $lifetime
     * @param ClockInterface $clock
     */
    public function __construct(
        private readonly ManagerInterface $manager,
        private readonly string $name = self::DEFAULT_SESSION_NAME,
        int $lifetime = 7200,
        private readonly ClockInterface $clock = new SystemClock(),
    ) {
        $this->factory = new CookieFactory(
            name: $this->name,
            lifetime: $lifetime,
            clock: $this->clock,
        );
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     * @throws \Exception
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $this->manager->set($request, $session = $this->fetchSessionId($request));

        $response = $handler->handle($request);

        $this->manager->set($request, SessionId::stored($session));

        return $response->withAddedHeader('Set-Cookie', (string)$this->factory->create(
            session: $session,
            secure: $this->isSecure($request),
        ));
    }

    /**
     * @param ServerRequestInterface $request
     * @return bool
     */
    private function isSecure(ServerRequestInterface $request): bool
    {
        $uri = $request->getUri();

        return \strtolower($uri->getScheme()) === 'https';
    }

    /**
     * @param ServerRequestInterface $request
     * @return SessionIdInterface
     */
    private function fetchSessionId(ServerRequestInterface $request): SessionIdInterface
    {
        $cookie = $request->getCookieParams();

        return match (true) {
            isset($cookie[$this->name]) => new SessionId($cookie[$this->name]),
            $this->clock !== null => SessionId::createFromClock($this->clock),
            default => SessionId::create(),
        };
    }
}
