<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container;

use Helix\Contracts\Container\DispatcherInterface;
use Helix\Contracts\ParamResolver\ParamResolverInterface;
use Helix\Contracts\ParamResolver\ValueResolverInterface;
use Helix\ParamResolver\Exception\ParamNotResolvableException;
use Helix\ParamResolver\Exception\SignatureException;
use Helix\ParamResolver\Resolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

final class Dispatcher implements DispatcherInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_INVALID_SIGNATURE = 'Action signature must be like '
        . '[service%smethod], but [%s] given';

    /**
     * @var non-empty-string
     */
    private const DEFAULT_ACTION_DELIMITER = '@';

    /**
     * @param ContainerInterface $container
     * @param ParamResolverInterface $resolver
     * @param non-empty-string $delimiter
     */
    public function __construct(
        private readonly ContainerInterface $container,
        private readonly ParamResolverInterface $resolver = new Resolver(),
        private readonly string $delimiter = self::DEFAULT_ACTION_DELIMITER,
    ) {
    }

    /**
     * {@inheritDoc}
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws ParamNotResolvableException
     * @throws SignatureException
     */
    public function call(callable|string $fn, iterable $resolvers = []): mixed
    {
        if (\is_string($fn) && \str_contains($fn, $this->delimiter)) {
            return $this->callServiceInstance($fn, $resolvers);
        }

        return $fn(...$this->resolver->fromCallable($fn, $resolvers));
    }

    /**
     * @param string $signature
     * @param iterable<ValueResolverInterface> $resolvers
     * @return mixed
     * @throws ParamNotResolvableException
     * @throws SignatureException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    private function callServiceInstance(string $signature, iterable $resolvers): mixed
    {
        $parts = \explode($this->delimiter, $signature);

        if (\count($parts) !== 2) {
            $message = \sprintf(self::ERROR_INVALID_SIGNATURE, $this->delimiter, $signature);
            throw new SignatureException($message);
        }

        [$service, $method] = $parts;

        return $this->call([$this->container->get($service, $resolvers), $method], $resolvers);
    }
}
