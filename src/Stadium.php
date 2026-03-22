<?php

declare(strict_types=1);

namespace BVP\Stadium;

/**
 * @psalm-import-type Stadium from StadiumType
 * @psalm-method static array<int<1, 24>, Stadium> all()
 * @psalm-method static Stadium byNumber(int|list<int> $arguments)
 * @psalm-method static Stadium byName(string|list<string> $arguments)
 * @psalm-method static Stadium byShortName(string|list<string> $arguments)
 * @psalm-method static Stadium byHiraganaName(string|list<string> $arguments)
 * @psalm-method static Stadium byKatakanaName(string|list<string> $arguments)
 * @psalm-method static Stadium byEnglishName(string|list<string> $arguments)
 * @psalm-method static Stadium byUrl(string|list<string> $arguments)
 *
 * @method static array<int<1, 24>, Stadium> all()
 * @method static Stadium byNumber(int|list<int> $arguments)
 * @method static Stadium byName(string|list<string> $arguments)
 * @method static Stadium byShortName(string|list<string> $arguments)
 * @method static Stadium byHiraganaName(string|list<string> $arguments)
 * @method static Stadium byKatakanaName(string|list<string> $arguments)
 * @method static Stadium byEnglishName(string|list<string> $arguments)
 * @method static Stadium byUrl(string|list<string> $arguments)
 *
 * @author shimomo
 */
final class Stadium implements StadiumInterface
{
    /**
     * @psalm-var ?\BVP\Stadium\StadiumInterface
     *
     * @var ?\BVP\Stadium\StadiumInterface
     */
    private static ?StadiumInterface $instance;

    /**
     * @psalm-param \BVP\Stadium\StadiumDispatcherInterface $stadium
     *
     * @param \BVP\Stadium\StadiumDispatcherInterface $stadium
     */
    public function __construct(private readonly StadiumDispatcherInterface $stadium)
    {
        //
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return list<Stadium>|Stadium|null
     *
     * @param string $name
     * @param array $arguments
     * @return ?array
     */
    public function __call(string $name, array $arguments): ?array
    {
        /** @psalm-var list<Stadium>|Stadium|null */
        return $this->stadium->$name(...$arguments);
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return list<Stadium>|Stadium|null
     *
     * @param string $name
     * @param array $arguments
     * @return ?array
     */
    public static function __callStatic(string $name, array $arguments): ?array
    {
        /** @psalm-var list<Stadium>|Stadium|null */
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @psalm-param ?\BVP\Stadium\StadiumDispatcherInterface $stadiumDispatcher
     * @psalm-return \BVP\Stadium\StadiumInterface
     *
     * @param ?\BVP\Stadium\StadiumDispatcherInterface $stadiumDispatcher
     * @return \BVP\Stadium\StadiumInterface
     */
    #[\Override]
    public static function getInstance(?StadiumDispatcherInterface $stadiumDispatcher = null): StadiumInterface
    {
        return self::$instance ??= new self($stadiumDispatcher ?? new StadiumDispatcher());
    }

    /**
     * @psalm-param ?\BVP\Stadium\StadiumDispatcherInterface $stadiumDispatcher
     * @psalm-return \BVP\Stadium\StadiumInterface
     *
     * @param ?\BVP\Stadium\StadiumDispatcherInterface $stadiumDispatcher
     * @return \BVP\Stadium\StadiumInterface
     */
    #[\Override]
    public static function createInstance(?StadiumDispatcherInterface $stadiumDispatcher = null): StadiumInterface
    {
        return self::$instance = new self($stadiumDispatcher ?? new StadiumDispatcher());
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    public static function resetInstance(): void
    {
        self::$instance = null;
    }
}
