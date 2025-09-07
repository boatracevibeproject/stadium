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
     * @var array<int, array<non-empty-string, non-empty-string|int<1, 24>>>
     */
    private array $stadiums;

    /**
     * @var array<non-empty-string, non-empty-string>
     */
    private array $resolveMethodMap = [
        '/^(all)$/u' => 'all',
        '/^by(.+)$/u' => 'by',
    ];

    /**
     * @return void
     */
    public function __construct()
    {
        $this->stadiums = require __DIR__ . '/../config/stadiums.php';
    }

    /**
     * @param  non-empty-string   $name
     * @param  array<int, mixed>  $arguments
     * @return array<non-empty-string, non-empty-string|int<1, 24>>|null
     */
    public function __call(string $name, array $arguments): ?array
    {
        return $this->resolveMethod($name, $arguments);
    }

    /**
     * @param  non-empty-string   $name
     * @param  array<int, mixed>  $arguments
     * @return array<non-empty-string, non-empty-string|int<1, 24>>|null
     *
     * @throws \BadMethodCallException
     */
    private function resolveMethod(string $name, array $arguments): ?array
    {
        foreach ($this->resolveMethodMap as $pattern => $method) {
            if (preg_match($pattern, $name, $matches)) {
                if (is_callable([$this, $method])) {
                    /** @var array<non-empty-string, non-empty-string|int<1, 24>>|null */
                    return $this->$method($matches[1], $arguments);
                }
            }
        }

        throw new \BadMethodCallException(
            __METHOD__ . "() - Call to undefined method '" . self::class . "::{$name}()'."
        );
    }

    /**
     * @param  non-empty-string   $name
     * @param  array<int, mixed>  $arguments
     * @return array<int, array<non-empty-string, non-empty-string|int<1, 24>>>
     *
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
     * @param  non-empty-string   $name
     * @param  array<int, mixed>  $arguments
     * @return array<non-empty-string, non-empty-string|int<1, 24>>|null
     *
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
            /** @var array<non-empty-string, non-empty-string|int<1, 24>>|null */
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
     * @param  non-empty-string  $value
     * @return string
     */
    private function convertToSnakeCase(string $value): string
    {
        return ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $value) ?? ''), '_');
    }
}
