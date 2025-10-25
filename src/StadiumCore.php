<?php

declare(strict_types=1);

namespace BVP\Stadium;

use Shimomo\Helper\Arr;

/**
 * @author shimomo
 */
final class StadiumCore implements StadiumCoreInterface
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
     * }>
     *
     * @var array
     */
    private array $stadiums;

    /**
     * @psalm-var array<non-empty-string, non-empty-string>
     *
     * @var array
     */
    private array $resolveMethodMap = [
        '/^(all)$/u' => 'all',
        '/^by(.+)$/u' => 'by',
    ];

    /**
     * @psalm-param array<int, array{
     *     number: int<1, 24>,
     *     name: non-empty-string,
     *     short_name: non-empty-string,
     *     hiragana_name: non-empty-string,
     *     katakana_name: non-empty-string,
     *     english_name: non-empty-string,
     *     url: non-empty-string
     * }>|null $stadiums
     *
     * @param array|null $stadiums
     */
    public function __construct(?array $stadiums = null)
    {
        $this->stadiums = $stadiums ?? require __DIR__ . '/../config/stadiums.php';
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
        return $this->resolveMethod($name, $arguments);
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
     * @throws \BadMethodCallException
     */
    private function resolveMethod(string $name, array $arguments): ?array
    {
        foreach ($this->resolveMethodMap as $pattern => $method) {
            if (preg_match($pattern, $name, $matches)) {
                if (is_callable([$this, $method])) {
                    /** @psalm-var array<int, array{
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
                     * }|null */
                    return $this->$method($matches[1], $arguments);
                }
            }
        }

        throw new \BadMethodCallException(
            __METHOD__ . "() - Call to undefined method '" . self::class . "::{$name}()'."
        );
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
     * }>
     *
     * @param string $name
     * @param array $arguments
     * @return array
     * @throws \InvalidArgumentException
     */
    private function all(string $name, array $arguments): array
    {
        if (($countArguments = count($arguments)) !== 0) {
            throw new \InvalidArgumentException(
                __METHOD__ . "() - Too many arguments to function " . self::class . "::{$name}(), " .
                "{$countArguments} passed and exactly 1 expected."
            );
        }

        return $this->stadiums;
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param array<int, mixed> $arguments
     * @psalm-return array{
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
     * @throws \InvalidArgumentException
     */
    private function by(string $name, array $arguments): ?array
    {
        if (($countArguments = count($arguments)) !== 1) {
            $messageType = $countArguments === 0 ? 'few' : 'many';
            throw new \InvalidArgumentException(
                __METHOD__ . "() - Too {$messageType} arguments to function " . self::class . "::by{$name}(), " .
                "{$countArguments} passed and exactly 1 expected."
            );
        }

        $snakeCaseName = $this->convertToSnakeCase($name);
        $flattenArguments = Arr::flatten($arguments);
        if (!is_string($flattenArguments[0]) && !is_int($flattenArguments[0])) {
            throw new \InvalidArgumentException(
                __METHOD__ . "() - Argument passed to function " . self::class .
                "::by{$name}() must be of type string or int, " . gettype($flattenArguments[0]) . " given."
            );
        }

        $exactMatchedStadium = Arr::firstWhere($this->stadiums, $snakeCaseName, $flattenArguments[0]);
        if (!is_null($exactMatchedStadium)) {
            /** @psalm-var array{
             *     number: int<1, 24>,
             *     name: non-empty-string,
             *     short_name: non-empty-string,
             *     hiragana_name: non-empty-string,
             *     katakana_name: non-empty-string,
             *     english_name: non-empty-string,
             *     url: non-empty-string
             * } */
            return $exactMatchedStadium;
        }

        $partialMatchedStadiums = array_filter(
            $this->stadiums,
            function (array $stadium) use ($snakeCaseName, $flattenArguments) {
                return $snakeCaseName !== '' && str_contains(
                    (string) $stadium[$snakeCaseName],
                    (string) $flattenArguments[0]
                );
            }
        );

        $partialMatchedStadium = reset($partialMatchedStadiums);
        return $partialMatchedStadium === false ? null : $partialMatchedStadium;
    }

    /**
     * @psalm-param string $value
     * @psalm-return string
     *
     * @param string $value
     * @return string
     */
    private function convertToSnakeCase(string $value): string
    {
        return ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $value) ?? ''), '_');
    }
}
