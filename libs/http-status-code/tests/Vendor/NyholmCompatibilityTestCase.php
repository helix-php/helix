<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\StatusCode\Tests\Vendor;

use Nyholm\Psr7\Response as NyholmResponse;

/**
 * @group http-status-code
 */
class NyholmCompatibilityTestCase extends VendorCompatibilityTestCase
{
    public function setUp(): void
    {
        if (!\class_exists(NyholmResponse::class)) {
            $this->markTestIncomplete('"nyholm/psr7" package required');
        }

        parent::setUp();
    }

    protected function getStatusCodes(): array
    {
        $reflection = new \ReflectionClass(NyholmResponse::class);

        if (!$reflection->hasConstant('PHRASES')) {
            $this->markTestIncomplete('The internal representation of the package has been changed');
        }

        return $reflection->getConstant('PHRASES');
    }
}
