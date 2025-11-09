<?php

declare(strict_types=1);

namespace BVP\Stadium\Tests;

/**
 * @psalm-import-type Stadium from \BVP\Stadium\StadiumType
 *
 * @author shimomo
 */
final class StadiumDataProvider
{
    /**
     * @psalm-return non-empty-list<array{
     *     expected: array<int<1, 24>, Stadium>
     * }>
     *
     * @return array
     */
    public static function allProvider(): array
    {
        return [
            [
                'expected' => [
                    1 => [
                        'number' => 1,
                        'name' => 'ボートレース桐生',
                        'short_name' => '桐生',
                        'hiragana_name' => 'ぼーとれーすきりゅう',
                        'katakana_name' => 'ボートレースキリュウ',
                        'english_name' => 'kiryu',
                        'url' => 'http://www.kiryu-kyotei.com/',
                    ],
                    2 => [
                        'number' => 2,
                        'name' => 'ボートレース戸田',
                        'short_name' => '戸田',
                        'hiragana_name' => 'ぼーとれーすとだ',
                        'katakana_name' => 'ボートレーストダ',
                        'english_name' => 'toda',
                        'url' => 'https://www.boatrace-toda.jp/',
                    ],
                    3 => [
                        'number' => 3,
                        'name' => 'ボートレース江戸川',
                        'short_name' => '江戸川',
                        'hiragana_name' => 'ぼーとれーすえどがわ',
                        'katakana_name' => 'ボートレースエドガワ',
                        'english_name' => 'edogawa',
                        'url' => 'https://boatrace-edogawa.com/',
                    ],
                    4 => [
                        'number' => 4,
                        'name' => 'ボートレース平和島',
                        'short_name' => '平和島',
                        'hiragana_name' => 'ぼーとれーすへいわじま',
                        'katakana_name' => 'ボートレースヘイワジマ',
                        'english_name' => 'heiwajima',
                        'url' => 'https://www.heiwajima.gr.jp/',
                    ],
                    5 => [
                        'number' => 5,
                        'name' => 'ボートレース多摩川',
                        'short_name' => '多摩川',
                        'hiragana_name' => 'ぼーとれーすたまがわ',
                        'katakana_name' => 'ボートレースタマガワ',
                        'english_name' => 'tamagawa',
                        'url' => 'https://boatrace-tamagawa.com/',
                    ],
                    6 => [
                        'number' => 6,
                        'name' => 'ボートレース浜名湖',
                        'short_name' => '浜名湖',
                        'hiragana_name' => 'ぼーとれーすはまなこ',
                        'katakana_name' => 'ボートレースハマナコ',
                        'english_name' => 'hamanako',
                        'url' => 'https://www.boatrace-hamanako.jp/',
                    ],
                    7 => [
                        'number' => 7,
                        'name' => 'ボートレース蒲郡',
                        'short_name' => '蒲郡',
                        'hiragana_name' => 'ぼーとれーすがまごおり',
                        'katakana_name' => 'ボートレースガマゴオリ',
                        'english_name' => 'gamagori',
                        'url' => 'https://www.gamagori-kyotei.com/',
                    ],
                    8 => [
                        'number' => 8,
                        'name' => 'ボートレース常滑',
                        'short_name' => '常滑',
                        'hiragana_name' => 'ぼーとれーすとこなめ',
                        'katakana_name' => 'ボートレーストコナメ',
                        'english_name' => 'tokoname',
                        'url' => 'https://www.boatrace-tokoname.jp/',
                    ],
                    9 => [
                        'number' => 9,
                        'name' => 'ボートレース津',
                        'short_name' => '津',
                        'hiragana_name' => 'ぼーとれーすつ',
                        'katakana_name' => 'ボートレースツ',
                        'english_name' => 'tsu',
                        'url' => 'https://www.boatrace-tsu.com/',
                    ],
                    10 => [
                        'number' => 10,
                        'name' => 'ボートレース三国',
                        'short_name' => '三国',
                        'hiragana_name' => 'ぼーとれーすみくに',
                        'katakana_name' => 'ボートレースミクニ',
                        'english_name' => 'mikuni',
                        'url' => 'https://www.boatrace-mikuni.jp/',
                    ],
                    11 => [
                        'number' => 11,
                        'name' => 'ボートレースびわこ',
                        'short_name' => 'びわこ',
                        'hiragana_name' => 'ぼーとれーすびわこ',
                        'katakana_name' => 'ボートレースビワコ',
                        'english_name' => 'biwako',
                        'url' => 'https://www.boatrace-biwako.jp/',
                    ],
                    12 => [
                        'number' => 12,
                        'name' => 'ボートレース住之江',
                        'short_name' => '住之江',
                        'hiragana_name' => 'ぼーとれーすすみのえ',
                        'katakana_name' => 'ボートレーススミノエ',
                        'english_name' => 'suminoe',
                        'url' => 'https://www.boatrace-suminoe.jp/',
                    ],
                    13 => [
                        'number' => 13,
                        'name' => 'ボートレース尼崎',
                        'short_name' => '尼崎',
                        'hiragana_name' => 'ぼーとれーすあまがさき',
                        'katakana_name' => 'ボートレースアマガサキ',
                        'english_name' => 'amagasaki',
                        'url' => 'https://boatrace-amagasaki.jp/',
                    ],
                    14 => [
                        'number' => 14,
                        'name' => 'ボートレース鳴門',
                        'short_name' => '鳴門',
                        'hiragana_name' => 'ぼーとれーすなると',
                        'katakana_name' => 'ボートレースナルト',
                        'english_name' => 'naruto',
                        'url' => 'https://www.n14.jp/',
                    ],
                    15 => [
                        'number' => 15,
                        'name' => 'ボートレース丸亀',
                        'short_name' => '丸亀',
                        'hiragana_name' => 'ぼーとれーすまるがめ',
                        'katakana_name' => 'ボートレースマルガメ',
                        'english_name' => 'marugame',
                        'url' => 'https://www.marugameboat.jp/',
                    ],
                    16 => [
                        'number' => 16,
                        'name' => 'ボートレース児島',
                        'short_name' => '児島',
                        'hiragana_name' => 'ぼーとれーすこじま',
                        'katakana_name' => 'ボートレースコジマ',
                        'english_name' => 'kojima',
                        'url' => 'https://www.kojimaboat.jp/',
                    ],
                    17 => [
                        'number' => 17,
                        'name' => 'ボートレース宮島',
                        'short_name' => '宮島',
                        'hiragana_name' => 'ぼーとれーすみやじま',
                        'katakana_name' => 'ボートレースミヤジマ',
                        'english_name' => 'miyajima',
                        'url' => 'https://www.boatrace-miyajima.com/',
                    ],
                    18 => [
                        'number' => 18,
                        'name' => 'ボートレース徳山',
                        'short_name' => '徳山',
                        'hiragana_name' => 'ぼーとれーすとくやま',
                        'katakana_name' => 'ボートレーストクヤマ',
                        'english_name' => 'tokuyama',
                        'url' => 'https://www.boatrace-tokuyama.jp/',
                    ],
                    19 => [
                        'number' => 19,
                        'name' => 'ボートレース下関',
                        'short_name' => '下関',
                        'hiragana_name' => 'ぼーとれーすしものせき',
                        'katakana_name' => 'ボートレースシモノセキ',
                        'english_name' => 'shimonoseki',
                        'url' => 'https://www.boatrace-shimonoseki.jp/',
                    ],
                    20 => [
                        'number' => 20,
                        'name' => 'ボートレース若松',
                        'short_name' => '若松',
                        'hiragana_name' => 'ぼーとれーすわかまつ',
                        'katakana_name' => 'ボートレースワカマツ',
                        'english_name' => 'wakamatsu',
                        'url' => 'https://www.wmb.jp/',
                    ],
                    21 => [
                        'number' => 21,
                        'name' => 'ボートレース芦屋',
                        'short_name' => '芦屋',
                        'hiragana_name' => 'ぼーとれーすあしや',
                        'katakana_name' => 'ボートレースアシヤ',
                        'english_name' => 'ashiya',
                        'url' => 'https://www.boatrace-ashiya.com/',
                    ],
                    22 => [
                        'number' => 22,
                        'name' => 'ボートレース福岡',
                        'short_name' => '福岡',
                        'hiragana_name' => 'ぼーとれーすふくおか',
                        'katakana_name' => 'ボートレースフクオカ',
                        'english_name' => 'fukuoka',
                        'url' => 'https://www.boatrace-fukuoka.com/',
                    ],
                    23 => [
                        'number' => 23,
                        'name' => 'ボートレース唐津',
                        'short_name' => '唐津',
                        'hiragana_name' => 'ぼーとれーすからつ',
                        'katakana_name' => 'ボートレースカラツ',
                        'english_name' => 'karatsu',
                        'url' => 'https://www.boatrace-karatsu.jp/',
                    ],
                    24 => [
                        'number' => 24,
                        'name' => 'ボートレース大村',
                        'short_name' => '大村',
                        'hiragana_name' => 'ぼーとれーすおおむら',
                        'katakana_name' => 'ボートレースオオムラ',
                        'english_name' => 'omura',
                        'url' => 'https://omurakyotei.jp/',
                    ],
                ],
            ],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int<1, 24>>|non-empty-list<non-empty-list<int<1, 24>>>,
     *     expected: Stadium
     * }>
     *
     * @return array
     */
    public static function byNumberProvider(): array
    {
        return [
            [
                'arguments' => [12],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [[12]],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>>,
     *     expected: Stadium
     * }>
     *
     * @return array
     */
    public static function byNameProvider(): array
    {
        return [
            [
                'arguments' => ['ボートレース住之江'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['ボートレース住之江']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @psalm-return array<int, array{
     *     arguments: non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>>,
     *     expected: Stadium
     * }>
     *
     * @return array
     */
    public static function byShortNameProvider(): array
    {
        return [
            [
                'arguments' => ['住之江'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['住之江']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @psalm-return array<int, array{
     *     arguments: non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>>,
     *     expected: Stadium
     * }>
     *
     * @return array
     */
    public static function byHiraganaNameProvider(): array
    {
        return [
            [
                'arguments' => ['ぼーとれーすすみのえ'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['ぼーとれーすすみのえ']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @psalm-return array<int, array{
     *     arguments: non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>>,
     *     expected: Stadium
     * }>
     *
     * @return array
     */
    public static function byKatakanaNameProvider(): array
    {
        return [
            [
                'arguments' => ['ボートレーススミノエ'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['ボートレーススミノエ']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @psalm-return array<int, array{
     *     arguments: non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>>,
     *     expected: Stadium
     * }>
     *
     * @return array
     */
    public static function byEnglishNameProvider(): array
    {
        return [
            [
                'arguments' => ['suminoe'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['suminoe']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @psalm-return array<int, array{
     *     arguments: non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>>,
     *     expected: Stadium
     * }>
     *
     * @return array
     */
    public static function byUrlProvider(): array
    {
        return [
            [
                'arguments' => ['suminoe'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['suminoe']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }
}
