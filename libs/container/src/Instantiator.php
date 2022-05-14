<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container;

use Helix\Container\Exception\ServiceNotFoundException;
use Helix\Container\Exception\ServiceNotInstantiatableException;
use Helix\Contracts\Container\InstantiatorInterface;
use Helix\Contracts\ParamResolver\ParamResolverInterface;
use Helix\Contracts\ParamResolver\ValueResolverInterface;
use Helix\ParamResolver\Exception\ParamNotResolvableException;
use Helix\ParamResolver\Exception\SignatureException;
use Helix\ParamResolver\Resolver;

final class Instantiator implements InstantiatorInterface
{
    /**
     * @var non-empty-string
     */
    private const ERROR_NOT_FOUND = 'Can not instantiate service [%s]';

    /**
     * @var non-empty-string
     */
    private const ERROR_INSTANTIATION = 'An error occurred while service [%s] instantiation: %s';

    /**
     * @param Registry $registry
     * @param ParamResolverInterface $resolver
     */
    public function __construct(
        private readonly Registry $registry,
        private readonly ParamResolverInterface $resolver = new Resolver(),
    ) {
    }

    /**
     * {@inheritDoc}
     * @throws ParamNotResolvableException
     * @throws ServiceNotFoundException
     * @throws ServiceNotInstantiatableException
     * @throws SignatureException
     */
    public function make(string $id, iterable $resolvers = []): object
    {
        $concrete = $this->registry->concrete($id);

        if (!\class_exists($concrete)) {
            $alias = $concrete === $id ? $concrete : "$id -> $concrete";
            throw new ServiceNotFoundException($id, \sprintf(self::ERROR_NOT_FOUND, $alias));
        }

        $arguments = $this->getConstructorArguments($concrete, $resolvers);

        try {
            /** @psalm-suppress InvalidReturnStatement */
            return new $concrete(...$arguments);
        } catch (\Throwable $e) {
            $message = \sprintf(self::ERROR_INSTANTIATION, $concrete, $e->getMessage());
            throw new ServiceNotInstantiatableException($concrete, $message, (int)$e->getCode(), $e);
        }
    }

    /**
     * @param class-string $class
     * @param iterable<ValueResolverInterface> $resolvers
     * @return iterable
     * @throws ParamNotResolvableException
     * @throws SignatureException
     */
    private function getConstructorArguments(string $class, iterable $resolvers): iterable
    {
        if (\method_exists($class, '__construct')) {
            return $this->resolver->fromMethod($class, '__construct', $resolvers);
        }

        return [];
    }
}
