<?php

declare(strict_types=1);

namespace BVP\Stadium;

/**
 * @author shimomo
 */
final class Stadium implements StadiumInterface
{
    /**
     * @var \BVP\Stadium\StadiumInterface|null
     */
    private static ?StadiumInterface $instance;

    /**
     * @param  \BVP\Stadium\StadiumCoreInterface  $stadium
     * @return void
     */
    public function __construct(private readonly StadiumCoreInterface $stadium)
    {
        //
    }

    /**
     * @param  non-empty-string   $name
     * @param  array<int, mixed>  $arguments
     * @return array<non-empty-string, non-empty-string|int<1, 24>>|null
     */
    public function __call(string $name, array $arguments): ?array
    {
        /** @var array<non-empty-string, non-empty-string|int<1, 24>>|null */
        return $this->stadium->$name(...$arguments);
    }

    /**
     * @param  non-empty-string   $name
     * @param  array<int, mixed>  $arguments
     * @return array<non-empty-string, non-empty-string|int<1, 24>>|null|null
     */
    public static function __callStatic(string $name, array $arguments): ?array
    {
        /** @var array<non-empty-string, non-empty-string|int<1, 24>>|null */
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @param  \BVP\Stadium\StadiumCoreInterface|null  $stadiumCore
     * @return \BVP\Stadium\StadiumInterface
     */
    #[\Override]
    public static function getInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface
    {
        return self::$instance ??= new self($stadiumCore ?? new StadiumCore());
    }

    /**
     * @param  \BVP\Stadium\StadiumCoreInterface|null  $stadiumCore
     * @return \BVP\Stadium\StadiumInterface
     */
    #[\Override]
    public static function createInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface
    {
        return self::$instance = new self($stadiumCore ?? new StadiumCore());
    }

    /**
     * @return void
     */
    #[\Override]
    public static function resetInstance(): void
    {
        self::$instance = null;
    }
}
