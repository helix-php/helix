<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\ValueResolver;

use Doctrine\Persistence\ObjectRepository;
use Helix\ParamResolver\Exception\ParamNotResolvableException;
use Helix\ParamResolver\Parameter;

/**
 * @template TReference of object
 * @template-extends PoolResolver<TReference>
 */
class RepositoryResolver extends PoolResolver
{
    /**
     * This list contains the interfaces of the repositories and the entity
     * classes that these repositories return.
     *
     * @var array<class-string<ObjectRepository>, class-string>
     */
    protected array $repositories = [
        // DoctrineRepository::class => DoctrineEntity::class,
    ];

    /**
     * @var non-empty-string
     */
    private const ERROR_NOT_RESOLVABLE = 'Cannot get valid Doctrine repository'
        . ' because it has not been registered';

    /**
     * This resolver is supported (returns {@see true}) if the Doctrine
     * repository is expected.
     *
     * @param \ReflectionParameter $parameter
     * @return bool
     */
    public function supports(\ReflectionParameter $parameter): bool
    {
        return Parameter::of($parameter)->type
            ->allowsSubclassOf(ObjectRepository::class);
    }

    /**
     * @return iterable<class-string<ObjectRepository>, class-string>
     */
    protected function getRepositories(): iterable
    {
        return $this->repositories;
    }

    /**
     * @param \ReflectionParameter $parameter
     * @return ObjectRepository
     * @throws ParamNotResolvableException
     */
    public function resolve(\ReflectionParameter $parameter): ObjectRepository
    {
        $info = Parameter::of($parameter);

        foreach ($this->getRepositories() as $interface => $entity) {
            if ($info->type->allowsSubclassOf($interface)) {
                $em = $this->getEntityManagerByParameter($parameter);

                return $em->getRepository($entity);
            }
        }

        throw new ParamNotResolvableException($parameter, self::ERROR_NOT_RESOLVABLE);
    }
}
