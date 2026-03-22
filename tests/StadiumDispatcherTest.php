<?php

declare(strict_types=1);

namespace BVP\Stadium\Tests;

use BVP\Stadium\StadiumDispatcher;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-import-type Stadium from \BVP\Stadium\StadiumType
 *
 * @author shimomo
 */
final class StadiumDispatcherTest extends TestCase
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     * @psalm-var \BVP\Stadium\StadiumDispatcher
     *
     * @var \BVP\Stadium\StadiumDispatcher
     */
    protected StadiumDispatcher $stadium;

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->stadium = new StadiumDispatcher();
    }

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
        $this->assertSame($expected, $this->stadium->all());
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
        $this->assertSame($expected, $this->stadium->byNumber(...$arguments));
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
        $this->assertSame($expected, $this->stadium->byName(...$arguments));
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
        $this->assertSame($expected, $this->stadium->byShortName(...$arguments));
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
        $this->assertSame($expected, $this->stadium->byHiraganaName(...$arguments));
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
        $this->assertSame($expected, $this->stadium->byKatakanaName(...$arguments));
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
        $this->assertSame($expected, $this->stadium->byEnglishName(...$arguments));
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
        $this->assertSame($expected, $this->stadium->byUrl(...$arguments));
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
            "BVP\Stadium\StadiumDispatcher::resolveMethod() - " .
            "Call to undefined method 'BVP\Stadium\StadiumDispatcher::ghost()'."
        );

        /** @psalm-suppress UndefinedMagicMethod */
        $this->stadium->ghost();
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
            "BVP\Stadium\StadiumDispatcher::by() - " .
            "Too few arguments to function BVP\Stadium\StadiumDispatcher::byNumber(), " .
            "0 passed and exactly 1 expected."
        );

        /** @psalm-suppress TooFewArguments */
        $this->stadium->byNumber();
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
            "BVP\Stadium\StadiumDispatcher::by() - " .
            "Too many arguments to function BVP\Stadium\StadiumDispatcher::byNumber(), " .
            "2 passed and exactly 1 expected."
        );

        /** @psalm-suppress TooManyArguments */
        $this->stadium->byNumber(12, 34);
    }
}
