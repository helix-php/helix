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
use Helix\Bridge\Doctrine\Attribute\EntityManager;
use Helix\Bridge\Doctrine\EntityManagerFactoryInterface;
use Helix\Container\ParamResolver\ValueResolverInterface;

/**
 * @template TReference of object
 */
abstract class PoolResolver implements ValueResolverInterface
{
    /**
     * @param TReference $reference
     * @param EntityManagerFactoryInterface $factory
     */
    public function __construct(
        protected readonly object $reference,
        protected readonly EntityManagerFactoryInterface $factory,
    ) {
    }

    /**
     * @param \ReflectionParameter $parameter
     * @return EntityManagerInterface
     */
    protected function getEntityManagerByParameter(\ReflectionParameter $parameter): EntityManagerInterface
    {
        return $this->getEntityManager($this->getEntityManagerName($parameter));
    }

    /**
     * @param \ReflectionParameter $parameter
     * @return string|null
     */
    protected function getEntityManagerName(\ReflectionParameter $parameter): ?string
    {
        foreach ($parameter->getAttributes(EntityManager::class, \ReflectionAttribute::IS_INSTANCEOF) as $attribute) {
            /** @var EntityManager $attr */
            $attr = $attribute->newInstance();

            return $attr->name;
        }

        return null;
    }

    /**
     * @param string|null $name
     * @return EntityManagerInterface
     */
    protected function getEntityManager(string $name = null): EntityManagerInterface
    {
        if ($name !== null) {
            return $this->factory->getManager($name, $this->reference);
        }

        return $this->factory->getDefaultManager($this->reference);
    }
}
