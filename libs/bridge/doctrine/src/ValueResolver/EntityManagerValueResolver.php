<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\ValueResolver;

use Doctrine\ORM\EntityManagerInterface;
use Helix\Bridge\Doctrine\EntityManagerFactoryInterface;
use Helix\Container\Introspection\Parameter;
use Helix\Container\ParamResolver\ValueResolverInterface;

/**
 * @template TReference of object
 */
class EntityManagerValueResolver implements ValueResolverInterface
{
    /**
     * @param TReference $reference
     * @param EntityManagerFactoryInterface $factory
     */
    public function __construct(
        private readonly object $reference,
        private readonly EntityManagerFactoryInterface $factory,
    ) {
    }

    /**
     * @param \ReflectionParameter $parameter
     * @return bool
     */
    public function supports(\ReflectionParameter $parameter): bool
    {
        return Parameter::of($parameter)->type
            ->allowsSubclassOf(EntityManagerInterface::class);
    }

    /**
     * @param \ReflectionParameter $parameter
     * @return EntityManagerInterface
     */
    public function resolve(\ReflectionParameter $parameter): EntityManagerInterface
    {
        return $this->factory->getDefaultManager($this->reference);
    }
}
