<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container;

use Helix\Container\ParamResolver\ParamResolver;
use Psr\Container\ContainerInterface;
use Helix\Contracts\Dispatcher\DispatcherInterface;
use Helix\Contracts\Container\Exception\ContainerExceptionInterface;
use Helix\Container\Exception\BadSignatureException;
use Helix\Container\Exception\InvocationException;
use Helix\Container\Exception\NotResolvableException;
use Helix\Container\ParamResolver\Renderer;

final class Dispatcher implements DispatcherInterface
{
    /**
     * @var string
     */
    private const DELIMITER = '@';

    /**
     * @var string
     */
    private const ERROR_DISPATCHING =
        'An error occurred while dispatching %s'
    ;

    /**
     * @var string
     */
    private const ERROR_SIGNATURE_FORMAT =
        'Method string signature DSL must be in "ServiceName' .
        self::DELIMITER . 'method" format, but "%s" passed'
    ;

    /**
     * @var ParamResolver
     */
    private ParamResolver $resolver;

    /**
     * @var ContainerInterface
     */
    private ContainerInterface $container;

    /**
     * @param ContainerInterface $container
     * @param ParamResolver $resolver
     */
    public function __construct(ContainerInterface $container, ParamResolver $resolver)
    {
        $this->container = $container;
        $this->resolver = $resolver;
    }

    /**
     * {@inheritDoc}
     */
    public function detach(callable|string $fn, callable|array $resolver = null): callable
    {
        return fn () => $this->call($fn, $resolver);
    }

    /**
     * {@inheritDoc}
     */
    public function call(callable|string $fn, callable|array $resolver = null): mixed
    {
        try {
            $handler = $this->resolveHandler($fn, $resolver);

            return $handler->invokeArgs(
                $this->resolveArguments($handler, $resolver)
            );
        } catch (ContainerExceptionInterface $e) {
            throw $this->dispatchingException($fn, $e);
        }
    }

    /**
     * @param callable|string $fn
     * @param \Throwable $e
     * @return InvocationException
     */
    private function dispatchingException(callable|string $fn, \Throwable $e): InvocationException
    {
        if (\is_callable($fn)) {
            try {
                $fn = Renderer::functionToString(new \ReflectionFunction($fn));
            } catch (\ReflectionException) {
                $fn = 'unknown function';
            }
        }

        $message = \sprintf(self::ERROR_DISPATCHING, $fn);
        return new InvocationException($message, (int)$e->getCode(), $e);
    }

    /**
     * @param callable|string $handler
     * @param callable|array|null $resolver
     * @return \ReflectionFunction
     * @throws BadSignatureException
     * @throws \ReflectionException
     */
    private function resolveHandler(callable|string $handler, callable|array|null $resolver): \ReflectionFunction
    {
        $handler = \Closure::fromCallable(
            \is_callable($handler) ? $handler : $this->signature($handler, $resolver)
        );

        return new \ReflectionFunction($handler);
    }

    /**
     * @param string $signature
     * @param callable|array|null $resolver
     * @return callable
     * @throws BadSignatureException
     */
    private function signature(string $signature, callable|array|null $resolver): callable
    {
        $chunks = \explode(self::DELIMITER, $signature);

        if (\count($chunks) !== 2) {
            throw new BadSignatureException(\sprintf(self::ERROR_SIGNATURE_FORMAT, $signature));
        }

        $result = [$this->container->get($chunks[0], $resolver), $chunks[1]];

        if (! \is_callable($result)) {
            // TODO Method X not found in service Y
            throw new BadSignatureException(\sprintf(self::ERROR_SIGNATURE_FORMAT, $signature));
        }

        return $result;
    }

    /**
     * @param \ReflectionFunction $fun
     * @param callable|array|null $resolver
     * @return array
     * @throws NotResolvableException
     */
    private function resolveArguments(\ReflectionFunction $fun, callable|array|null $resolver): array
    {
        try {
            return $this->resolver->resolve($fun, $resolver);
        } catch (NotResolvableException $e) {
            $message = $e->getMessage() . ' of ' . Renderer::functionToString($fun);
            throw new NotResolvableException($message, (int)$e->getCode(), $e);
        }
    }
}
