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

Stadium::byNumber(12);
Stadium::byName('ボートレース住之江');
Stadium::byShortName('住之江');
Stadium::byHiraganaName('すみのえ');
Stadium::byKatakanaName('スミノエ');
Stadium::byEnglishName('suminoe');
Stadium::byUrl('suminoe');
```

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
