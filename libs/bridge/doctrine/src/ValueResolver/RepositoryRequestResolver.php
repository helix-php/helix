<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Bridge\Doctrine\ValueResolver;

use Helix\Bridge\Doctrine\EntityManagerFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @template-extends RepositoryResolver<ServerRequestInterface>
 */
class RepositoryRequestResolver extends RepositoryResolver
{
    /**
     * @param ServerRequestInterface $request
     * @param EntityManagerFactoryInterface $factory
     */
    public function __construct(
        ServerRequestInterface $request,
        EntityManagerFactoryInterface $factory,
    ) {
        parent::__construct($request, $factory);
    }
}
