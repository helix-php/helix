<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Contracts\Database\Query;

use Helix\Contracts\Database\QueryInterface;
use Helix\Contracts\Database\ResultInterface;

/**
 * @psalm-import-type ParamKey from QueryInterface
 * @psalm-import-type ParamValue from QueryInterface
 */
interface ExecutableQueryInterface extends QueryInterface
{
    /**
     * @param iterable<ParamKey, ParamValue> $params
     * @return ResultInterface
     */
    public function execute(iterable $params = []): ResultInterface;
}
