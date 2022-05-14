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
 * This class is responsible for getting the entity manager from the connection
 * pool depending on the current HTTP request.
 */
final class EntityManagerRequestResolver extends EntityManagerValueResolver
{
    public function __construct(
        ServerRequestInterface $request,
        EntityManagerFactoryInterface $factory,
    ) {
        parent::__construct($request, $factory);
    }
}
