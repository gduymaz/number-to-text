<?php

namespace Splendour\NumberToText\Translations;

use Splendour\NumberToText\Contracts\Translations;

class English implements Translations
{
    public function getUnitsDigits(): array
    {
        return [
            "", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine",
        ];
    }

    public function getTensDigits(): array
    {
        return [
            "", "ten", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety",
        ];
    }

    public function getHundredsDigits(): array
    {
        return [
            "", "onehundred", "twohundred", "threehundred", "fourhundred",
            "fivehundred", "sixhundred", "sevenhundred", "eighthundred", "ninehundred"
        ];
    }

    public function getThousandsDigits(): array
    {
        return [
            "", "thousand", "million", "billion", "trillion", "quadrillion", "quintillion", "sextillion", "septillion",
            "octillion", "nonillion", "decillion",
        ];
    }

    public function getReplacer(): array
    {
        return [
            ["tenone", "tentwo", "tenthree", "tenfour", "tenfive", "tensix", "tenseven", "teneight", "tennine"],
            ["eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"],
        ];
    }
}
