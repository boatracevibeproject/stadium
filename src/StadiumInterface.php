<?php

declare(strict_types=1);

namespace BVP\Stadium;

/**
 * @author shimomo
 */
interface StadiumInterface
{
    /**
     * @psalm-param ?\BVP\Stadium\StadiumDispatcherInterface $stadiumDispatcher
     * @psalm-return \BVP\Stadium\StadiumInterface
     *
     * @param ?\BVP\Stadium\StadiumDispatcherInterface $stadiumDispatcher
     * @return \BVP\Stadium\StadiumInterface
     */
    public static function getInstance(?StadiumDispatcherInterface $stadiumDispatcher = null): StadiumInterface;

    /**
     * @psalm-param ?\BVP\Stadium\StadiumDispatcherInterface $stadiumDispatcher
     * @psalm-return \BVP\Stadium\StadiumInterface
     *
     * @param ?\BVP\Stadium\StadiumDispatcherInterface $stadiumDispatcher
     * @return \BVP\Stadium\StadiumInterface
     */
    public static function createInstance(?StadiumDispatcherInterface $stadiumDispatcher = null): StadiumInterface;

    /**
     * @psalm-return void
     *
     * @return void
     */
    public static function resetInstance(): void;
}
