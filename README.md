# Stadium for Boatrace Venture Project

[![keepalive](https://github.com/shimomo/bvp-stadium/actions/workflows/keepalive.yml/badge.svg)](https://github.com/shimomo/bvp-stadium/actions/workflows/keepalive.yml)
[![psalm](https://github.com/shimomo/bvp-stadium/actions/workflows/psalm.yml/badge.svg)](https://github.com/shimomo/bvp-stadium/actions/workflows/psalm.yml)
[![security](https://github.com/shimomo/bvp-stadium/actions/workflows/security.yml/badge.svg)](https://github.com/shimomo/bvp-stadium/actions/workflows/security.yml)
[![test](https://github.com/shimomo/bvp-stadium/actions/workflows/test.yml/badge.svg)](https://github.com/shimomo/bvp-stadium/actions/workflows/test.yml)
[![codecov](https://codecov.io/gh/shimomo/bvp-stadium/graph/badge.svg?token=URL318B6CX)](https://codecov.io/gh/shimomo/bvp-stadium)
[![php](https://poser.pugx.org/bvp/stadium/require/php)](https://packagist.org/packages/bvp/stadium)
[![stable](https://poser.pugx.org/bvp/stadium/v/stable)](https://packagist.org/packages/bvp/stadium)
[![license](https://poser.pugx.org/bvp/stadium/license)](https://packagist.org/packages/bvp/stadium)

## 📦 Requirements

- php: ^8.2
- shimomo/helper: ^0.1

## 💾 Installation

```bash
composer require bvp/stadium
```

## ⚡ Usage

### サポートメソッド一覧

| メソッド | 説明 | 引数 |
|---|---|---|
| `Stadium::all()` | レース場を全て取得 | なし |
| `Stadium::byNumber($stadiumNumber)` | レース場を取得 | `$stadiumNumber` : 1〜24 |
| `Stadium::byName($stadiumName)` | 同上 | `$stadiumName` : 正式名 |
| `Stadium::byShortName($stadiumShortName)` | 同上 | `$stadiumShortName` : 省略名 |
| `Stadium::byHiraganaName($stadiumHiraganaName)` | 同上 | `$stadiumHiraganaName` : ひらがな名 |
| `Stadium::byKatakanaName($stadiumKatakanaName)` | 同上 | `$stadiumKatakanaName` : カタカナ名 |
| `Stadium::byEnglishName($stadiumEnglishName)` | 同上 | `$stadiumEnglishName` : 英語名 |
| `Stadium::byUrl($stadiumUrl)` | 同上 | `$stadiumUrl` : URL |

### 基本的な使い方

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use BVP\Stadium\Stadium;

Stadium::all();
Stadium::byNumber(12);
Stadium::byName('ボートレース住之江');
Stadium::byShortName('住之江');
Stadium::byHiraganaName('すみのえ');
Stadium::byKatakanaName('スミノエ');
Stadium::byEnglishName('suminoe');
Stadium::byUrl('suminoe');
```

### Stadium::all()

```php
$stadium = Stadium::all();
print_r($stadium);
```

<details>
<summary>取得結果</summary>

```php
Array
(
    [0] => Array
        (
            [number] => 1
            [name] => ボートレース桐生
            [short_name] => 桐生
            [hiragana_name] => ぼーとれーすきりゅう
            [katakana_name] => ボートレースキリュウ
            [english_name] => kiryu
            [url] => http://www.kiryu-kyotei.com/
        )

    [1] => Array
        (
            [number] => 2
            [name] => ボートレース戸田
            [short_name] => 戸田
            [hiragana_name] => ぼーとれーすとだ
            [katakana_name] => ボートレーストダ
            [english_name] => toda
            [url] => https://www.boatrace-toda.jp/
        )

    [2] => Array
        (
            [number] => 3
            [name] => ボートレース江戸川
            [short_name] => 江戸川
            [hiragana_name] => ぼーとれーすえどがわ
            [katakana_name] => ボートレースエドガワ
            [english_name] => edogawa
            [url] => https://boatrace-edogawa.com/
        )

    [3] => Array
        (
            [number] => 4
            [name] => ボートレース平和島
            [short_name] => 平和島
            [hiragana_name] => ぼーとれーすへいわじま
            [katakana_name] => ボートレースヘイワジマ
            [english_name] => heiwajima
            [url] => https://www.heiwajima.gr.jp/
        )

    [4] => Array
        (
            [number] => 5
            [name] => ボートレース多摩川
            [short_name] => 多摩川
            [hiragana_name] => ぼーとれーすたまがわ
            [katakana_name] => ボートレースタマガワ
            [english_name] => tamagawa
            [url] => https://boatrace-tamagawa.com/
        )

    [5] => Array
        (
            [number] => 6
            [name] => ボートレース浜名湖
            [short_name] => 浜名湖
            [hiragana_name] => ぼーとれーすはまなこ
            [katakana_name] => ボートレースハマナコ
            [english_name] => hamanako
            [url] => https://www.boatrace-hamanako.jp/
        )

    [6] => Array
        (
            [number] => 7
            [name] => ボートレース蒲郡
            [short_name] => 蒲郡
            [hiragana_name] => ぼーとれーすがまごおり
            [katakana_name] => ボートレースガマゴオリ
            [english_name] => gamagori
            [url] => https://www.gamagori-kyotei.com/
        )

    [7] => Array
        (
            [number] => 8
            [name] => ボートレース常滑
            [short_name] => 常滑
            [hiragana_name] => ぼーとれーすとこなめ
            [katakana_name] => ボートレーストコナメ
            [english_name] => tokoname
            [url] => https://www.boatrace-tokoname.jp/
        )

    [8] => Array
        (
            [number] => 9
            [name] => ボートレース津
            [short_name] => 津
            [hiragana_name] => ぼーとれーすつ
            [katakana_name] => ボートレースツ
            [english_name] => tsu
            [url] => https://www.boatrace-tsu.com/
        )

    [9] => Array
        (
            [number] => 10
            [name] => ボートレース三国
            [short_name] => 三国
            [hiragana_name] => ぼーとれーすみくに
            [katakana_name] => ボートレースミクニ
            [english_name] => mikuni
            [url] => https://www.boatrace-mikuni.jp/
        )

    [10] => Array
        (
            [number] => 11
            [name] => ボートレースびわこ
            [short_name] => びわこ
            [hiragana_name] => ぼーとれーすびわこ
            [katakana_name] => ボートレースビワコ
            [english_name] => biwako
            [url] => https://www.boatrace-biwako.jp/
        )

    [11] => Array
        (
            [number] => 12
            [name] => ボートレース住之江
            [short_name] => 住之江
            [hiragana_name] => ぼーとれーすすみのえ
            [katakana_name] => ボートレーススミノエ
            [english_name] => suminoe
            [url] => https://www.boatrace-suminoe.jp/
        )

    [12] => Array
        (
            [number] => 13
            [name] => ボートレース尼崎
            [short_name] => 尼崎
            [hiragana_name] => ぼーとれーすあまがさき
            [katakana_name] => ボートレースアマガサキ
            [english_name] => amagasaki
            [url] => https://boatrace-amagasaki.jp/
        )

    [13] => Array
        (
            [number] => 14
            [name] => ボートレース鳴門
            [short_name] => 鳴門
            [hiragana_name] => ぼーとれーすなると
            [katakana_name] => ボートレースナルト
            [english_name] => naruto
            [url] => https://www.n14.jp/
        )

    [14] => Array
        (
            [number] => 15
            [name] => ボートレース丸亀
            [short_name] => 丸亀
            [hiragana_name] => ぼーとれーすまるがめ
            [katakana_name] => ボートレースマルガメ
            [english_name] => marugame
            [url] => https://www.marugameboat.jp/
        )

    [15] => Array
        (
            [number] => 16
            [name] => ボートレース児島
            [short_name] => 児島
            [hiragana_name] => ぼーとれーすこじま
            [katakana_name] => ボートレースコジマ
            [english_name] => kojima
            [url] => https://www.kojimaboat.jp/
        )

    [16] => Array
        (
            [number] => 17
            [name] => ボートレース宮島
            [short_name] => 宮島
            [hiragana_name] => ぼーとれーすみやじま
            [katakana_name] => ボートレースミヤジマ
            [english_name] => miyajima
            [url] => https://www.boatrace-miyajima.com/
        )

    [17] => Array
        (
            [number] => 18
            [name] => ボートレース徳山
            [short_name] => 徳山
            [hiragana_name] => ぼーとれーすとくやま
            [katakana_name] => ボートレーストクヤマ
            [english_name] => tokuyama
            [url] => https://www.boatrace-tokuyama.jp/
        )

    [18] => Array
        (
            [number] => 19
            [name] => ボートレース下関
            [short_name] => 下関
            [hiragana_name] => ぼーとれーすしものせき
            [katakana_name] => ボートレースシモノセキ
            [english_name] => shimonoseki
            [url] => https://www.boatrace-shimonoseki.jp/
        )

    [19] => Array
        (
            [number] => 20
            [name] => ボートレース若松
            [short_name] => 若松
            [hiragana_name] => ぼーとれーすわかまつ
            [katakana_name] => ボートレースワカマツ
            [english_name] => wakamatsu
            [url] => https://www.wmb.jp/
        )

    [20] => Array
        (
            [number] => 21
            [name] => ボートレース芦屋
            [short_name] => 芦屋
            [hiragana_name] => ぼーとれーすあしや
            [katakana_name] => ボートレースアシヤ
            [english_name] => ashiya
            [url] => https://www.boatrace-ashiya.com/
        )

    [21] => Array
        (
            [number] => 22
            [name] => ボートレース福岡
            [short_name] => 福岡
            [hiragana_name] => ぼーとれーすふくおか
            [katakana_name] => ボートレースフクオカ
            [english_name] => fukuoka
            [url] => https://www.boatrace-fukuoka.com/
        )

    [22] => Array
        (
            [number] => 23
            [name] => ボートレース唐津
            [short_name] => 唐津
            [hiragana_name] => ぼーとれーすからつ
            [katakana_name] => ボートレースカラツ
            [english_name] => karatsu
            [url] => https://www.boatrace-karatsu.jp/
        )

    [23] => Array
        (
            [number] => 24
            [name] => ボートレース大村
            [short_name] => 大村
            [hiragana_name] => ぼーとれーすおおむら
            [katakana_name] => ボートレースオオムラ
            [english_name] => omura
            [url] => https://omurakyotei.jp/
        )

)
```

</details>

### Stadium::byNumber()

```php
$stadium = Stadium::byNumber(12);
print_r($stadium);
```

<details>
<summary>取得結果</summary>

```php
Array
(
    [number] => 12
    [name] => ボートレース住之江
    [short_name] => 住之江
    [hiragana_name] => ぼーとれーすすみのえ
    [katakana_name] => ボートレーススミノエ
    [english_name] => suminoe
    [url] => https://www.boatrace-suminoe.jp/
)
```

</details>

### Stadium::byName()

```php
$stadium = Stadium::byName('ボートレース住之江');
print_r($stadium);
```

<details>
<summary>取得結果</summary>

```php
Array
(
    [number] => 12
    [name] => ボートレース住之江
    [short_name] => 住之江
    [hiragana_name] => ぼーとれーすすみのえ
    [katakana_name] => ボートレーススミノエ
    [english_name] => suminoe
    [url] => https://www.boatrace-suminoe.jp/
)
```

</details>

### Stadium::byShortName()

```php
$stadium = Stadium::byShortName('住之江');
print_r($stadium);
```

<details>
<summary>取得結果</summary>

```php
Array
(
    [number] => 12
    [name] => ボートレース住之江
    [short_name] => 住之江
    [hiragana_name] => ぼーとれーすすみのえ
    [katakana_name] => ボートレーススミノエ
    [english_name] => suminoe
    [url] => https://www.boatrace-suminoe.jp/
)
```

</details>

### Stadium::byHiraganaName()

```php
$stadium = Stadium::byHiraganaName('すみのえ');
print_r($stadium);
```

<details>
<summary>取得結果</summary>

```php
Array
(
    [number] => 12
    [name] => ボートレース住之江
    [short_name] => 住之江
    [hiragana_name] => ぼーとれーすすみのえ
    [katakana_name] => ボートレーススミノエ
    [english_name] => suminoe
    [url] => https://www.boatrace-suminoe.jp/
)
```

</details>

### Stadium::byKatakanaName()

```php
$stadium = Stadium::byKatakanaName('スミノエ');
print_r($stadium);
```

<details>
<summary>取得結果</summary>

```php
Array
(
    [number] => 12
    [name] => ボートレース住之江
    [short_name] => 住之江
    [hiragana_name] => ぼーとれーすすみのえ
    [katakana_name] => ボートレーススミノエ
    [english_name] => suminoe
    [url] => https://www.boatrace-suminoe.jp/
)
```

</details>

### Stadium::byEnglishName()

```php
$stadium = Stadium::byEnglishName('suminoe');
print_r($stadium);
```

<details>
<summary>取得結果</summary>

```php
Array
(
    [number] => 12
    [name] => ボートレース住之江
    [short_name] => 住之江
    [hiragana_name] => ぼーとれーすすみのえ
    [katakana_name] => ボートレーススミノエ
    [english_name] => suminoe
    [url] => https://www.boatrace-suminoe.jp/
)
```

</details>

### Stadium::byUrl()

```php
$stadium = Stadium::byUrl('suminoe');
print_r($stadium);
```

<details>
<summary>取得結果</summary>

```php
Array
(
    [number] => 12
    [name] => ボートレース住之江
    [short_name] => 住之江
    [hiragana_name] => ぼーとれーすすみのえ
    [katakana_name] => ボートレーススミノエ
    [english_name] => suminoe
    [url] => https://www.boatrace-suminoe.jp/
)
```

</details>

## 📄 License

Stadium は [MIT license](LICENSE) の元で公開されています。
