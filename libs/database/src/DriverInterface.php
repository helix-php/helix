<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Database;

use Helix\Database\Driver\ConnectorInterface;
use Helix\Database\Driver\ExceptionConverterInterface;

interface DriverInterface extends
    ConnectorInterface,
    ExceptionConverterInterface
{
}
