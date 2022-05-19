<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\StatusCode\Tests\Vendor;

use Laminas\Diactoros\Response as LaminasResponse;

/**
 * @group http-status-code
 */
class LaminasCompatibilityTestCase extends VendorCompatibilityTestCase
{
    public function setUp(): void
    {
        if (!\class_exists(LaminasResponse::class)) {
            $this->markTestIncomplete('"laminas/laminas-diactoros" package required');
        }

        parent::setUp();
    }

    protected function getStatusCodes(): array
    {
        $reflection = new \ReflectionClass(LaminasResponse::class);

        if (!$reflection->hasProperty('phrases')) {
            $this->markTestIncomplete('The internal representation of the package has been changed');
        }

        $property = $reflection->getProperty('phrases');

        return $property->getDefaultValue();
    }
}
