<?php

declare(strict_types=1);

namespace BVP\Stadium;

/**
 * @psalm-type Stadium = array{
 *     number: int<1, 24>,
 *     name: non-empty-string,
 *     short_name: non-empty-string,
 *     hiragana_name: non-empty-string,
 *     katakana_name: non-empty-string,
 *     english_name: non-empty-string,
 *     url: non-empty-string
 * }
 *
 * @author shimomo
 */
final class StadiumType
{
    //
}
