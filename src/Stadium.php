<?php

declare(strict_types=1);

namespace BVP\Stadium;

use BVP\Stadium\Enums\Stadium as StadiumEnum;

/**
 * @author shimomo
 */
final class Stadium
{
    /**
     * @param int|string $value
     * @return ?\BVP\Stadium\Enums\Stadium
     */
    public static function from(int|string $value): ?StadiumEnum
    {
        return self::fromNumber((int) $value) ?? self::fromName((string) $value);
    }

    /**
     * @param int $number
     * @return ?\BVP\Stadium\Enums\Stadium
     */
    public static function fromNumber(int $number): ?StadiumEnum
    {
        return StadiumEnum::tryFrom($number);
    }

    /**
     * @param string $name
     * @return ?\BVP\Stadium\Enums\Stadium
     */
    public static function fromName(string $name): ?StadiumEnum
    {
        return StadiumEnum::fromName($name);
    }
}
