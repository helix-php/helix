<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\View\Engine\Php;

use Helix\View\View;

final class PhpView extends View
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        \ob_start();
        try {
            \extract($this->vars);
            require $this->name;
        } finally {
            return \ob_get_clean();
        }
    }
}
