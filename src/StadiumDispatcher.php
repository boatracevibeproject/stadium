<?php

declare(strict_types=1);

namespace BVP\Stadium;

use Shimomo\Helper\Arr;

/**
 * @psalm-import-type Stadium from StadiumType
 * @psalm-method array<int<1, 24>, Stadium> all()
 * @psalm-method Stadium byNumber(int|list<int> $arguments)
 * @psalm-method Stadium byName(string|list<string> $arguments)
 * @psalm-method Stadium byShortName(string|list<string> $arguments)
 * @psalm-method Stadium byHiraganaName(string|list<string> $arguments)
 * @psalm-method Stadium byKatakanaName(string|list<string> $arguments)
 * @psalm-method Stadium byEnglishName(string|list<string> $arguments)
 * @psalm-method Stadium byUrl(string|list<string> $arguments)
 *
 * @method array<int<1, 24>, Stadium> all()
 * @method Stadium byNumber(int|list<int> $arguments)
 * @method Stadium byName(string|list<string> $arguments)
 * @method Stadium byShortName(string|list<string> $arguments)
 * @method Stadium byHiraganaName(string|list<string> $arguments)
 * @method Stadium byKatakanaName(string|list<string> $arguments)
 * @method Stadium byEnglishName(string|list<string> $arguments)
 * @method Stadium byUrl(string|list<string> $arguments)
 *
 * @author shimomo
 */
final class StadiumDispatcher implements StadiumDispatcherInterface
{
    /**
     * @psalm-var list<Stadium>
     *
     * @var array
     */
    private array $stadiums;

    /**
     * @psalm-var array<non-empty-string, 'all'|'by'>
     *
     * @var array
     */
    private array $resolveMethodMap = [
        '/^(all)$/u' => 'all',
        '/^by(.+)$/u' => 'by',
    ];

    /**
     * @psalm-param ?list<Stadium> $stadiums
     *
     * @param ?array $stadiums
     */
    public function __construct(?array $stadiums = null)
    {
        /** @psalm-var list<Stadium> */
        $this->stadiums = $stadiums ?? require __DIR__ . '/../config/stadiums.php';
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
        return $this->resolveMethod($name, $arguments);
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return list<Stadium>|Stadium|null
     *
     * @param string $name
     * @param array $arguments
     * @return ?array
     * @throws \BadMethodCallException
     */
    private function resolveMethod(string $name, array $arguments): ?array
    {
        foreach ($this->resolveMethodMap as $pattern => $method) {
            if (preg_match($pattern, $name, $matches)) {
                if (is_callable([$this, $method])) {
                    if ($method === 'all') {
                        /** @psalm-var array<int<1, 24>, Stadium> */
                        return $this->$method();
                    }

                    /** @psalm-var list<Stadium>|Stadium|null */
                    return $this->$method($matches[1], $arguments);
                }
            }
        }

        throw new \BadMethodCallException(
            __METHOD__ . "() - Call to undefined method '" . self::class . "::{$name}()'."
        );
    }

    /**
     * @psalm-return array<int<1, 24>, Stadium>
     *
     * @return array
     */
    private function all(): array
    {
        return $this->convertToKeyedArray($this->stadiums, 'number');
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return ?Stadium
     *
     * @param string $name
     * @param array $arguments
     * @return ?array
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
            /** @psalm-var Stadium */
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
     * @psalm-param list<Stadium>|array<int<1, 24>, Stadium> $array
     * @psalm-param non-empty-string $key
     * @psalm-return array<int<1, 24>, Stadium>
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    private function convertToKeyedArray(array $array, string $key): array
    {
        /** @psalm-var array<array-key, int<1, 24>|non-empty-string> */
        $keys = array_column($array, $key);

        /** @psalm-var array<int<1, 24>, Stadium> */
        return array_combine($keys, $array);
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
        return ltrim(strtolower((string) preg_replace('/[A-Z]/', '_$0', $value)), '_');
    }
}
