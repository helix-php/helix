<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Container;

use Doctrine\Instantiator\Instantiator as DoctrineInstantiator;
use Doctrine\Instantiator\InstantiatorInterface as DoctrineInstantiatorInterface;
use Helix\Container\ParamResolver\ParamResolver;
use Helix\Contracts\Container\Exception\ContainerExceptionInterface;
use Helix\Contracts\Container\InstantiatorInterface;
use Helix\Container\Exception\NotInstantiatableException;

final class Instantiator implements InstantiatorInterface
{
    /**
     * @var string
     */
    private const CONSTRUCTOR_METHOD = '__construct';

    /**
     * @var DoctrineInstantiatorInterface
     */
    private DoctrineInstantiatorInterface $instantiator;

    /**
     * @var ParamResolver
     */
    private ParamResolver $resolver;

    /**
     * @param ParamResolver $resolver
     */
    public function __construct(ParamResolver $resolver)
    {
        $this->resolver = $resolver;
        $this->instantiator = new DoctrineInstantiator();
    }

    /**
     * {@inheritDoc}
     */
    public function make(string $id, callable|array $resolver = null): object
    {
        try {
            $instance = $this->instantiator->instantiate($id);

            if (\method_exists($instance, self::CONSTRUCTOR_METHOD)) {
                $constructor = new \ReflectionMethod($instance, self::CONSTRUCTOR_METHOD);

                $constructor->invokeArgs($instance, $this->resolver->resolve($constructor, $resolver));
            }

            return $instance;
        } catch (ContainerExceptionInterface $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw new NotInstantiatableException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
