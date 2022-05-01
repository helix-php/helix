<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container;

use Helix\Container\Definition\Registrar;
use Helix\Container\Definition\WeakSingletonDefinition;
use Helix\Container\ParamResolver\ParamResolver;
use Helix\Contracts\Container\ContainerInterface;
use Helix\Contracts\Container\Definition\DefinitionInterface;
use Helix\Contracts\Container\Definition\DefinitionRegistrarInterface;
use Helix\Contracts\Dispatcher\DispatcherInterface;
use Helix\Contracts\Container\InstantiatorInterface;
use Helix\Container\Definition\CloneableDefinition;
use Helix\Container\Definition\Definition;
use Helix\Container\Definition\FactoryDefinition;
use Helix\Container\Definition\InstanceDefinition;
use Helix\Container\Definition\SingletonDefinition;
use Helix\Container\Exception\NotFoundException;
use Helix\Container\Exception\RecursiveDeclarationException;
use Helix\Container\Exception\RegistrationException;
use Psr\Container\ContainerInterface as PsrContainerInterface;

final class Container implements
    ContainerInterface,
    DispatcherInterface,
    InstantiatorInterface,
    RegistrarInterface
{
    /**
     * @var string
     */
    private const ERROR_DECLARATOR = 'The passed service declarator [%s] is not a valid class name';

    /**
     * @var string
     */
    private const ERROR_NOT_FOUND = 'ServiceDefinition [%s] not found or could not be instantiated';

    /**
     * @var array<Definition>
     */
    private array $services = [];

    /**
     * @var array<string, string>
     */
    private array $aliases = [];

    /**
     * @var DispatcherInterface
     */
    private DispatcherInterface $dispatcher;

    /**
     * @var InstantiatorInterface
     */
    private InstantiatorInterface $instantiator;

    /**
     * @var array<callable>
     */
    private array $resolving = [];

    /**
     * @var array<callable>
     */
    private array $resolved = [];

    /**
     * @var PsrContainerInterface|null
     */
    private ?PsrContainerInterface $parent;

    /**
     * @param PsrContainerInterface|null $parent
     */
    public function __construct(PsrContainerInterface $parent = null)
    {
        $this->parent = $parent;

        $resolver = new ParamResolver($this, $this);
        $this->dispatcher = new Dispatcher($this, $resolver);
        $this->instantiator = new Instantiator($resolver);

        $this->registerSelf();
    }

    /**
     * @return iterable<Definition>
     */
    public function services(): iterable
    {
        return $this->services;
    }

    /**
     * @return iterable<string, string>
     */
    public function aliases(): iterable
    {
        return $this->aliases;
    }

    /**
     * @param callable $handler
     * @return $this
     */
    public function resolving(callable $handler): self
    {
        $this->resolving[] = $handler;

        return $this;
    }

    /**
     * @param callable $handler
     * @return $this
     */
    public function resolved(callable $handler): self
    {
        $this->resolved[] = $handler;

        return $this;
    }

    /**
     * @return $this
     */
    private function registerSelf(): self
    {
        $this->instance($this)
            ->as(self::class)
            ->withInterfaces()
        ;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function instance(object $entry): DefinitionRegistrarInterface
    {
        return $this->instanceAs($entry::class, $entry);
    }

    /**
     * @param class-string $id
     * @param object $entry
     * @return DefinitionRegistrarInterface
     */
    public function instanceAs(string $id, object $entry): DefinitionRegistrarInterface
    {
        return $this->define($id, new InstanceDefinition($entry));
    }

    /**
     * {@inheritDoc}
     */
    public function define(string $id, DefinitionInterface $service): DefinitionRegistrarInterface
    {
        $this->services[$id] = $service;

        return new Registrar($id, $this);
    }

    /**
     * @param class-string $id
     * @param class-string|string $alias
     * @return $this
     */
    public function alias(string $id, string $alias): self
    {
        $this->aliases[$alias] = $id;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function detach(callable|string $fn, callable|array $resolver = null): callable
    {
        return $this->dispatcher->detach($fn, $resolver);
    }

    /**
     * {@inheritDoc}
     */
    public function call(callable|string $fn, callable|array $resolver = null): mixed
    {
        return $this->dispatcher->call($fn, $resolver);
    }

    /**
     * {@inheritDoc}
     */
    public function make(string $id, callable|array $resolver = null): object
    {
        return $this->instantiator->make($id, $resolver);
    }

    /**
     * {@inheritDoc}
     */
    public function get($id, callable|array $resolver = null): object
    {
        assert(\is_string($id));

        if ($this->parent?->has($id)) {
            return $this->parent->get($id, $resolver);
        }

        $locator = $id;

        try {
            if (isset($this->aliases[$locator])) {
                $locator = $this->aliases[$locator];
            }

            if (isset($this->services[$locator])) {
                foreach ($this->resolving as $handler) {
                    $handler($locator);
                }

                try {
                    return $result = $this->services[$locator]->resolve($resolver);
                } finally {
                    foreach ($this->resolved as $handler) {
                        $handler($result, $locator);
                    }
                }
            }

            return $this->instantiator->make($locator, $resolver);
        } catch (RecursiveDeclarationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw new NotFoundException(\sprintf(self::ERROR_NOT_FOUND, $id), $e->getCode(), $e);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function has($id): bool
    {
        assert(\is_string($id));

        if (isset($this->aliases[$id])) {
            return true;
        }

        if (isset($this->services[$id])) {
            return true;
        }

        return (bool)($this->parent?->has($id));
    }

    /**
     * {@inheritDoc}
     * @throws RegistrationException
     */
    public function factory(string $id, callable|string $declarator = null): DefinitionRegistrarInterface
    {
        $declarator = $this->declarator($id, $declarator);

        return $this->define($id, new FactoryDefinition($id, $this, $declarator));
    }

    /**
     * @param class-string $id
     * @param callable|string|null $declarator
     * @return callable
     * @throws RegistrationException
     */
    private function declarator(string $id, callable|string $declarator = null): callable
    {
        $declarator ??= $id;

        if (! \is_callable($declarator)) {
            if (! \class_exists($declarator)) {
                throw new RegistrationException(\sprintf(self::ERROR_DECLARATOR, $declarator));
            }

            return fn () => $this->instantiator->make($declarator);
        }

        return $declarator;
    }

    /**
     * {@inheritDoc}
     * @throws RegistrationException
     */
    public function singleton(string $id, callable|string $declarator = null): DefinitionRegistrarInterface
    {
        $declarator = $this->declarator($id, $declarator);

        return $this->define($id, new SingletonDefinition($id, $this, $declarator));
    }
    /**
     * {@inheritDoc}
     * @throws RegistrationException
     */
    public function weakSingleton(string $id, callable|string $declarator = null): DefinitionRegistrarInterface
    {
        $declarator = $this->declarator($id, $declarator);

        return $this->define($id, new WeakSingletonDefinition($id, $this, $declarator));
    }

    /**
     * @param string $id
     * @param callable $then
     * @param callable|array|null $resolver
     * @return $this
     */
    public function when(string $id, callable $then, callable|array $resolver = null): self
    {
        if ($this->has($id)) {
            $then($this->get($id, $resolver));
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     * @throws RegistrationException
     */
    public function cloneable(string $id, object $entry): DefinitionRegistrarInterface
    {
        return $this->define($id, new CloneableDefinition($entry));
    }
}
