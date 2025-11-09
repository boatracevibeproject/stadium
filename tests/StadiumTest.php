<?php

declare(strict_types=1);

namespace BVP\Stadium\Tests;

use BVP\Stadium\Stadium;
use BVP\Stadium\StadiumInterface;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-import-type Stadium from \BVP\Stadium\StadiumType
 *
 * @author shimomo
 */
final class StadiumTest extends TestCase
{
    /**
     * @psalm-param array<int<1, 24>, Stadium> $expected
     * @psalm-return void
     *
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'allProvider')]
    public function testAll(array $expected): void
    {
        $this->assertSame($expected, Stadium::all());
    }

    /**
     * @psalm-param non-empty-list<int<1, 24>>|non-empty-list<non-empty-list<int<1, 24>>> $arguments
     * @psalm-param Stadium $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byNumberProvider')]
    public function testByNumber(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>> $arguments
     * @psalm-param Stadium $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byNameProvider')]
    public function testByName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>> $arguments
     * @psalm-param Stadium $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byShortNameProvider')]
    public function testByShortName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byShortName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>> $arguments
     * @psalm-param Stadium $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byHiraganaNameProvider')]
    public function testByHiraganaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byHiraganaName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>> $arguments
     * @psalm-param Stadium $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byKatakanaNameProvider')]
    public function testByKatakanaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byKatakanaName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>> $arguments
     * @psalm-param Stadium $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byEnglishNameProvider')]
    public function testByEnglishName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byEnglishName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>> $arguments
     * @psalm-param Stadium $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byUrlProvider')]
    public function testByUrl(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byUrl(...$arguments));
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testThrowsExceptionWhenMethodDoesNotExist(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\Stadium\StadiumCore::resolveMethod() - " .
            "Call to undefined method 'BVP\Stadium\StadiumCore::ghost()'."
        );

        /** @psalm-suppress UndefinedMagicMethod */
        Stadium::ghost();
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testThrowsExceptionWhenArgumentsAreTooFew(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "BVP\Stadium\StadiumCore::by() - " .
            "Too few arguments to function BVP\Stadium\StadiumCore::byNumber(), " .
            "0 passed and exactly 1 expected."
        );

        /** @psalm-suppress TooFewArguments */
        Stadium::byNumber();
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testThrowsExceptionWhenArgumentsAreTooMany(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "BVP\Stadium\StadiumCore::by() - " .
            "Too many arguments to function BVP\Stadium\StadiumCore::byNumber(), " .
            "2 passed and exactly 1 expected."
        );

        /** @psalm-suppress TooManyArguments */
        Stadium::byNumber(12, 34);
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testGetInstance(): void
    {
        Stadium::resetInstance();
        $this->assertInstanceOf(StadiumInterface::class, Stadium::getInstance());
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testCreateInstance(): void
    {
        Stadium::resetInstance();
        $this->assertInstanceOf(StadiumInterface::class, Stadium::createInstance());
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testResetInstance(): void
    {
        Stadium::resetInstance();
        $instance1 = Stadium::getInstance();
        Stadium::resetInstance();
        $instance2 = Stadium::getInstance();
        $this->assertNotSame($instance1, $instance2);
    }
}
