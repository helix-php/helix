<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Session;

/**
 * @template TReference of object
 * @template-implements ManagerInterface<TReference>
 */
class WeakManager implements ManagerInterface
{
    /**
     * @var \WeakMap<TReference, SessionIdInterface>
     */
    private \WeakMap $map;

    public function __construct()
    {
        $this->map = new \WeakMap();
    }

    /**
     * {@inheritDoc}
     */
    public function has(object $reference): bool
    {
        return isset($this->map[$reference]);
    }

    /**
     * {@inheritDoc}
     */
    public function get(object $reference): SessionIdInterface
    {
        if (!isset($this->map[$reference])) {
            $this->create($reference);
        }

        return $this->map[$reference];
    }

    /**
     * {@inheritDoc}
     */
    public function create(object $reference): SessionIdInterface
    {
        $session = SessionId::create();

        $this->set($reference, $session);

        return $session;
    }

    /**
     * {@inheritDoc}
     */
    public function set(object $reference, SessionIdInterface $id): void
    {
        $this->map[$reference] = $id;
    }

    /**
     * @return void
     */
    public function free(): void
    {
        $this->map = new \WeakMap();
    }
}
