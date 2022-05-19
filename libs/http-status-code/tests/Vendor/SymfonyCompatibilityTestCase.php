<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\StatusCode\Tests\Vendor;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

/**
 * @group http-status-code
 */
class SymfonyCompatibilityTestCase extends VendorCompatibilityTestCase
{
    public function setUp(): void
    {
        if (!\class_exists(SymfonyResponse::class)) {
            $this->markTestIncomplete('"symfony/http-foundation" package required');
        }

        parent::setUp();
    }

    protected function getStatusCodes(): array
    {
        return SymfonyResponse::$statusTexts;
    }
}
