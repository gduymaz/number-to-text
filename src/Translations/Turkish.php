<?php

namespace Splendour\NumberToText\Translations;

use Splendour\NumberToText\Contracts\Translations;

class Turkish implements Translations
{
    public function getUnitsDigits(): array
    {
        return [
            "", "bir", "iki", "üç", "dört", "beş", "altı", "yedi", "sekiz", "dokuz"
        ];
    }

    public function getTensDigits(): array
    {
        return [
            "", "on", "yirmi", "otuz", "kırk", "elli", "altmış", "yetmiş", "seksen", "doksan"
        ];
    }

    public function getHundredsDigits(): array
    {
        return [
            "", "yüz", "ikiyüz", "üçyüz", "dörtyüz", "beşyüz", "altıyüz", "yediyüz", "sekizyüz", "dokuzyüz"
        ];
    }

    public function getThousandsDigits(): array
    {
        return [
            "", "bin", "milyon", "milyar", "trilyon", "katrilyon",
            "kentilyon", "seksilyon", "septilyon", "oktilyon", "nobilyon", "desilyon"
        ];
    }

    public function getReplacer(): array
    {
        return [['bir bin'], ['bin']];
    }
}
