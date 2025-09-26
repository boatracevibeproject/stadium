<?php

declare(strict_types=1);

namespace BVP\Stadium;

/**
 * @author shimomo
 */
final class Stadium implements StadiumInterface
{
    /**
     * @psalm-var \BVP\Stadium\StadiumInterface|null
     *
     * @var \BVP\Stadium\StadiumInterface|null
     */
    private static ?StadiumInterface $instance;

    /**
     * @psalm-param \BVP\Stadium\StadiumCoreInterface $stadium
     * @psalm-return void
     *
     * @param \BVP\Stadium\StadiumCoreInterface $stadium
     * @return void
     */
    public function __construct(private readonly StadiumCoreInterface $stadium)
    {
        //
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param array<int, mixed> $arguments
     * @psalm-return array<int, array{
     *     number: int<1, 24>,
     *     name: non-empty-string,
     *     short_name: non-empty-string,
     *     hiragana_name: non-empty-string,
     *     katakana_name: non-empty-string,
     *     english_name: non-empty-string,
     *     url: non-empty-string
     * }>|array{
     *     number: int<1, 24>,
     *     name: non-empty-string,
     *     short_name: non-empty-string,
     *     hiragana_name: non-empty-string,
     *     katakana_name: non-empty-string,
     *     english_name: non-empty-string,
     *     url: non-empty-string
     * }|null
     *
     * @param string $name
     * @param array $arguments
     * @return array|null
     */
    public function __call(string $name, array $arguments): ?array
    {
        /**
         * @psalm-var array<int, array{
         *     number: int<1, 24>,
         *     name: non-empty-string,
         *     short_name: non-empty-string,
         *     hiragana_name: non-empty-string,
         *     katakana_name: non-empty-string,
         *     english_name: non-empty-string,
         *     url: non-empty-string
         * }>|array{
         *     number: int<1, 24>,
         *     name: non-empty-string,
         *     short_name: non-empty-string,
         *     hiragana_name: non-empty-string,
         *     katakana_name: non-empty-string,
         *     english_name: non-empty-string,
         *     url: non-empty-string
         * }|null
         */
        return $this->stadium->$name(...$arguments);
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param array<int, mixed> $arguments
     * @psalm-return array<int, array{
     *     number: int<1, 24>,
     *     name: non-empty-string,
     *     short_name: non-empty-string,
     *     hiragana_name: non-empty-string,
     *     katakana_name: non-empty-string,
     *     english_name: non-empty-string,
     *     url: non-empty-string
     * }>|array{
     *     number: int<1, 24>,
     *     name: non-empty-string,
     *     short_name: non-empty-string,
     *     hiragana_name: non-empty-string,
     *     katakana_name: non-empty-string,
     *     english_name: non-empty-string,
     *     url: non-empty-string
     * }|null
     *
     * @param string $name
     * @param array $arguments
     * @return array|null
     */
    public static function __callStatic(string $name, array $arguments): ?array
    {
        /**
         * @psalm-var array<int, array{
         *     number: int<1, 24>,
         *     name: non-empty-string,
         *     short_name: non-empty-string,
         *     hiragana_name: non-empty-string,
         *     katakana_name: non-empty-string,
         *     english_name: non-empty-string,
         *     url: non-empty-string
         * }>|array{
         *     number: int<1, 24>,
         *     name: non-empty-string,
         *     short_name: non-empty-string,
         *     hiragana_name: non-empty-string,
         *     katakana_name: non-empty-string,
         *     english_name: non-empty-string,
         *     url: non-empty-string
         * }|null
         */
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @psalm-param \BVP\Stadium\StadiumCoreInterface|null $stadiumCore
     * @psalm-return \BVP\Stadium\StadiumInterface
     *
     * @param \BVP\Stadium\StadiumCoreInterface|null $stadiumCore
     * @return \BVP\Stadium\StadiumInterface
     */
    #[\Override]
    public static function getInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface
    {
        return self::$instance ??= new self($stadiumCore ?? new StadiumCore());
    }

    /**
     * @psalm-param \BVP\Stadium\StadiumCoreInterface|null $stadiumCore
     * @psalm-return \BVP\Stadium\StadiumInterface
     *
     * @param \BVP\Stadium\StadiumCoreInterface|null $stadiumCore
     * @return \BVP\Stadium\StadiumInterface
     */
    #[\Override]
    public static function createInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface
    {
        return self::$instance = new self($stadiumCore ?? new StadiumCore());
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
