<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\StatusCode\Tests\Vendor;

use HttpSoft\Message\Response as HttpSoftResponse;

/**
 * @group http-status-code
 */
class HttpSoftCompatibilityTestCase extends VendorCompatibilityTestCase
{
    public function setUp(): void
    {
        if (!\class_exists(HttpSoftResponse::class)) {
            $this->markTestIncomplete('"httpsoft/http-message" package required');
        }

        parent::setUp();
    }

    protected function getStatusCodes(): array
    {
        $reflection = new \ReflectionClass(HttpSoftResponse::class);

        if (!$reflection->hasProperty('phrases')) {
            $this->markTestIncomplete('The internal representation of the package has been changed');
        }

        $property = $reflection->getProperty('phrases');

        return $property->getDefaultValue();
    }
}
