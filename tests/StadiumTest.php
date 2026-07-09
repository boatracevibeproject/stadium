<?php

declare(strict_types=1);

namespace BVP\Stadium\Tests;

use BVP\Stadium\Enums\Stadium as StadiumEnum;
use BVP\Stadium\Stadium;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class StadiumTest extends TestCase
{
    /**
     * @param int|string $value
     * @param ?\BVP\Stadium\Enums\Stadium $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(StadiumDataProvider::class, 'stadiumFromProvider')]
    public function testStadiumFrom(int|string $value, ?StadiumEnum $expected): void
    {
        $this->assertSame($expected, Stadium::from($value));
    }

    /**
     * @param int $number
     * @param ?\BVP\Stadium\Enums\Stadium $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(StadiumDataProvider::class, 'stadiumFromNumberProvider')]
    public function testStadiumFromNumber(int $number, ?StadiumEnum $expected): void
    {
        $this->assertSame($expected, Stadium::fromNumber($number));
    }

    /**
     * @param string $name
     * @param ?\BVP\Stadium\Enums\Stadium $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(StadiumDataProvider::class, 'stadiumFromNameProvider')]
    public function testStadiumFromName(string $name, ?StadiumEnum $expected): void
    {
        $this->assertSame($expected, Stadium::fromName($name));
    }
}
