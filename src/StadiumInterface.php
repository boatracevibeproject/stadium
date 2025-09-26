<?php

declare(strict_types=1);

namespace BVP\Stadium;

/**
 * @author shimomo
 */
interface StadiumInterface
{
    /**
     * @psalm-param \BVP\Stadium\StadiumCoreInterface|null $stadiumCore
     * @psalm-return \BVP\Stadium\StadiumInterface
     *
     * @param \BVP\Stadium\StadiumCoreInterface|null $stadiumCore
     * @return \BVP\Stadium\StadiumInterface
     */
    public static function getInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface;

    /**
     * @psalm-param \BVP\Stadium\StadiumCoreInterface|null $stadiumCore
     * @psalm-return \BVP\Stadium\StadiumInterface
     *
     * @param \BVP\Stadium\StadiumCoreInterface|null $stadiumCore
     * @return \BVP\Stadium\StadiumInterface
     */
    public static function createInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface;

    /**
     * @psalm-return void
     *
     * @return void
     */
    public static function resetInstance(): void;
}
