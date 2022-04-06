<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Boot\Extension\Info;

class MutableInfoProvider extends InfoProvider
{
    public string $name;
    public string $description = '';
    public string $version = 'dev-master';
}
