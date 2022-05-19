<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Http\StatusCode\Tests;

use Helix\Http\StatusCode\Category;
use Helix\Http\StatusCode\CustomStatusCode;
use Helix\Http\StatusCode\StatusCode;

/**
 * @group http-status-code
 */
class StatusCodeTestCase extends TestCase
{
    public function statusCodesDataProvider(): array
    {
        $result = [];

        for ($i = 100; $i < 600; ++$i) {
            $exists = StatusCode::tryFrom($i) !== null;
            $suffix = $exists ? 'available' : 'custom';

            $result["Status-Code: $i ($suffix)"] = [$i, $exists];
        }

        return $result;
    }

    /**
     * @dataProvider statusCodesDataProvider
     */
    public function testMemoization(int $code, bool $available): void
    {
        $status = StatusCode::create($code);

        if ($available) {
            $this->assertInstanceOf(StatusCode::class, $status);
        } else {
            $this->assertInstanceOf(CustomStatusCode::class, $status);
        }
    }

    /**
     * @dataProvider statusCodesDataProvider
     */
    public function testStatusCodeValue(int $code): void
    {
        $status = StatusCode::create($code);

        $this->assertSame($code, $status->getCode());
    }

    /**
     * @dataProvider statusCodesDataProvider
     */
    public function testReasonPhrase(int $code, bool $available): void
    {
        $status = StatusCode::create($code);

        if ($available) {
            $this->assertNotSame('', $status->getReasonPhrase());
        } else {
            $this->assertSame('', $status->getReasonPhrase());
        }
    }

    /**
     * @dataProvider statusCodesDataProvider
     */
    public function testCategory(int $code, bool $available): void
    {
        $status = StatusCode::create($code);

        if ($available) {
            $this->assertNotSame(Category::UNKNOWN, $status->getCategory());
        } else {
            $this->assertSame(Category::parse($code), $status->getCategory());
        }
    }
}
