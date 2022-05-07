<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container;

use Helix\Container\Definition\DefinitionInterface;
use Helix\Container\Definition\DefinitionRegistrarInterface;
use Helix\Container\Definition\FactoryDefinition;
use Helix\Container\Definition\InstanceDefinition;
use Helix\Container\Definition\SingletonDefinition;
use Helix\Container\Definition\WeakSingletonDefinition;
use Helix\Container\Exception\ServiceNotFoundException;
use Helix\Container\ParamResolver\ContainerServiceResolver;
use Helix\Container\ParamResolver\ValueResolverInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;

/**
 * @template-implements \IteratorAggregate<non-empty-string, DefinitionInterface>
 */
final class Container implements
    ContainerInterface,
    RegistrarInterface,
    DispatcherInterface,
    InstantiatorInterface
{
    /**
     * @var Registry
     */
    private readonly Registry $definitions;

    /**
     * @var ParamResolverInterface
     */
    private readonly ParamResolverInterface $resolver;

    /**
     * @var InstantiatorInterface
     */
    private readonly InstantiatorInterface $instantiator;

    /**
     * @var DispatcherInterface
     */
    private readonly DispatcherInterface $dispatcher;

    /**
     * @param ContainerInterface|null $parent
     */
    public function __construct(
        private readonly ?ContainerInterface $parent = null,
    ) {
        $this->resolver = new ParamResolver([
            new ContainerServiceResolver($this),
        ]);

        $this->definitions = new Registry();
        $this->instantiator = new Instantiator($this->definitions, $this->resolver);
        $this->dispatcher = new Dispatcher($this, $this->resolver);

        $this->registerSelf();
    }

    /**
     * @template TIdentifier as object
     *
     * @param non-empty-string|class-string<TIdentifier> $id
     * @param \Closure():TIdentifier|null $registrar
     * @return DefinitionRegistrarInterface
     */
    public function singleton(string $id, \Closure $registrar = null): DefinitionRegistrarInterface
    {
        return $this->define($id, new SingletonDefinition(
            $this->detach($registrar ?? fn () => $this->make($id))
        ));
    }

    /**
     * @template TIdentifier as object
     *
     * @param non-empty-string|class-string<TIdentifier> $id
     * @param \Closure():TIdentifier|null $registrar
     * @return DefinitionRegistrarInterface
     */
    public function weak(string $id, \Closure $registrar = null): DefinitionRegistrarInterface
    {
        return $this->define($id, new WeakSingletonDefinition(
            $this->detach($registrar ?? fn () => $this->make($id))
        ));
    }

    /**
     * @template TIdentifier as object
     *
     * @param non-empty-string|class-string<TIdentifier> $id
     * @param \Closure():TIdentifier|null $registrar
     * @return DefinitionRegistrarInterface
     */
    public function factory(string $id, \Closure $registrar = null): DefinitionRegistrarInterface
    {
        return $this->define($id, new FactoryDefinition(
            $this->detach($registrar ?? fn () => $this->make($id))
        ));
    }

    /**
     * @param object $id
     * @return DefinitionRegistrarInterface
     */
    public function instance(object $id): DefinitionRegistrarInterface
    {
        return $this->define($id::class, new InstanceDefinition($id));
    }

    /**
     * {@inheritDoc}
     */
    public function define(string $id, DefinitionInterface $service): DefinitionRegistrarInterface
    {
        return $this->definitions->define($id, $service);
    }

    /**
     * {@inheritDoc}
     */
    public function alias(string $id, string $alias): void
    {
        $this->definitions->alias($id, $alias);
    }

    /**
     * @template T of object
     *
     * @param non-empty-string|class-string<T>|interface-string<T> $id
     * @param iterable<ValueResolverInterface> $resolvers
     * @return T
     * @throws ServiceNotFoundException
     * @throws ContainerExceptionInterface
     */
    public function get(string $id, iterable $resolvers = []): object
    {
        if ($this->parent?->has($id)) {
            return $this->parent->get($id);
        }

        if ($this->definitions->has($id)) {
            $definition = $this->definitions->get($id);

            return $definition->resolve();
        }

        return $this->make($id, $resolvers);
    }

    /**
     * @param non-empty-string $id
     * @return bool
     */
    public function has(string $id): bool
    {
        return $this->parent?->has($id) || $this->definitions->has($id);
    }

    /**
     * {@inheritDoc}
     */
    public function call(callable|string $fn, iterable $resolvers = []): mixed
    {
        return $this->dispatcher->call($fn, $resolvers);
    }

    /**
     * @param callable|string $fn
     * @param iterable<ValueResolverInterface> $resolvers
     * @return \Closure():mixed
     */
    public function detach(callable|string $fn, iterable $resolvers = []): \Closure
    {
        return function () use ($fn, $resolvers): mixed {
            return $this->call($fn, $resolvers);
        };
    }

    /**
     * {@inheritDoc}
     */
    public function make(string $id, iterable $resolvers = []): object
    {
        return $this->instantiator->make($id, $resolvers);
    }

    /**
     * @return void
     */
    private function registerSelf(): void
    {
        $this->instance($this)
            ->withInterfaces();
    }
}
