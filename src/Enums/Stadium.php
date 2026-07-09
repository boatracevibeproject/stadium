<?php

declare(strict_types=1);

namespace BVP\Stadium\Enums;

/**
 * @author shimomo
 */
enum Stadium: int
{
    case kiryu = 1;
    case toda = 2;
    case edogawa = 3;
    case heiwajima = 4;
    case tamagawa = 5;
    case hamanako = 6;
    case gamagori = 7;
    case tokoname = 8;
    case tsu = 9;
    case mikuni = 10;
    case biwako = 11;
    case suminoe = 12;
    case amagasaki = 13;
    case naruto = 14;
    case marugame = 15;
    case kojima = 16;
    case miyajima = 17;
    case tokuyama = 18;
    case shimonoseki = 19;
    case wakamatsu = 20;
    case ashiya = 21;
    case fukuoka = 22;
    case karatsu = 23;
    case omura = 24;

    /**
     * @return ?array{
     *   number: int<1, 47>,
     *   name: non-empty-string,
     *   short_name: non-empty-string,
     *   hiragana_name: non-empty-string,
     *   katakana_name: non-empty-string,
     *   english_name: non-empty-string,
     *   url: non-empty-string,
     * }
     */
    public function toArray(): ?array
    {
        $stadiums = require __DIR__ . '/../Resources/stadiums.php';

        foreach ($stadiums as $stadium) {
            if ($stadium['number'] === $this->value) {
                return $stadium;
            }
        }

        return null;
    }

    /**
     * @return ?string
     */
    public function name(): ?string
    {
        return $this->toArray()['name'] ?? null;
    }

    /**
     * @return ?string
     */
    public function shortName(): ?string
    {
        return $this->toArray()['short_name'] ?? null;
    }

    /**
     * @return ?string
     */
    public function hiraganaName(): ?string
    {
        return $this->toArray()['hiragana_name'] ?? null;
    }

    /**
     * @return ?string
     */
    public function katakanaName(): ?string
    {
        return $this->toArray()['katakana_name'] ?? null;
    }

    /**
     * @return ?string
     */
    public function englishName(): ?string
    {
        return $this->toArray()['english_name'] ?? null;
    }

    /**
     * @return ?string
     */
    public function url(): ?string
    {
        return $this->toArray()['url'] ?? null;
    }

    /**
     * @param ?string $name
     * @return ?self
     */
    public static function fromName(?string $name): ?self
    {
        if ($name !== null) {
            foreach (self::cases() as $case) {
                if (
                    $case->name() === $name ||
                    $case->shortName() === $name ||
                    $case->hiraganaName() === $name ||
                    $case->katakanaName() === $name ||
                    $case->englishName() === $name
                ) {
                    return $case;
                }
            }
        }

        return null;
    }
}
