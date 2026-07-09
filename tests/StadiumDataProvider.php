<?php

declare(strict_types=1);

namespace BVP\Stadium\Tests;

use BVP\Stadium\Enums\Stadium as StadiumEnum;

/**
 * @author shimomo
 */
final class StadiumDataProvider
{
    /**
     * @return non-empty-list<array{
     *   number: int|string,
     *   expected: ?\BVP\Stadium\Enums\Stadium,
     * }>
     */
    public static function stadiumFromProvider(): array
    {
        return [
            ['value' => 0, 'expected' => null],
            ['value' => 1, 'expected' => StadiumEnum::kiryu],
            ['value' => 2, 'expected' => StadiumEnum::toda],
            ['value' => '', 'expected' => null],
            ['value' => 'ボートレース戸田', 'expected' => StadiumEnum::toda],
            ['value' => '戸田', 'expected' => StadiumEnum::toda],
            ['value' => 'ぼーとれーすとだ', 'expected' => StadiumEnum::toda],
            ['value' => 'ボートレーストダ', 'expected' => StadiumEnum::toda],
            ['value' => 'toda', 'expected' => StadiumEnum::toda],
        ];
    }

    /**
     * @return non-empty-list<array{
     *   number: int,
     *   expected: ?\BVP\Stadium\Enums\Stadium,
     * }>
     */
    public static function prefectureFromNumberProvider(): array
    {
        return [
            ['value' => 0, 'expected' => null],
            ['value' => 1, 'expected' => StadiumEnum::kiryu],
            ['value' => 2, 'expected' => StadiumEnum::toda],
        ];
    }

    /**
     * @return non-empty-list<array{
     *   name: string,
     *   expected: ?\BVP\Stadium\Enums\Stadium,
     * }>
     */
    public static function prefectureFromNameProvider(): array
    {
        return [
            ['value' => '', 'expected' => null],
            ['value' => 'ボートレース戸田', 'expected' => StadiumEnum::toda],
            ['value' => '戸田', 'expected' => StadiumEnum::toda],
            ['value' => 'ぼーとれーすとだ', 'expected' => StadiumEnum::toda],
            ['value' => 'ボートレーストダ', 'expected' => StadiumEnum::toda],
            ['value' => 'toda', 'expected' => StadiumEnum::toda],
        ];
    }
}
