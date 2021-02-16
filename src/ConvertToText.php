<?php

namespace Splendour\NumberToText;

use Splendour\NumberToText\Contracts\Translations;

class ConvertToText
{
    /**
     * @var Number
     */
    protected $number;
    protected $translation;

    public function __construct(Number $number, string $translation)
    {
        $this->number = $number;
        $this->translation = $translation;
    }

    public function convert(): array
    {
        $number = $this->number->getNumber();
        return $this->makeConversion($number);
    }

    private function makeConversion($number): array
    {
        $numberArray = $this->divideDecimals($number);
        $mainNumber = $this->convertToText($numberArray[0]);
        $secondNumber = $this->convertToText($numberArray[1]);
        return [$mainNumber, $secondNumber];
    }

    private function divideDecimals($number): array
    {

        $primary = floor($number);
        if ($number != $primary) {
            $secondary = $this->makeInt(bcsub($number, $primary, 20));
        } else {
            $secondary = 0;
        }
        return [$primary, $secondary];
    }

    private function makeInt(float $decimal): int
    {
        $power = strlen($decimal);
        if ($power > 2) {
            return pow(10, $power - 2) * $decimal;
        }
        return 0;
    }

    private function convertToText($int): string
    {
        $paddings = $this->paddings($int);
        return $this->makeTranslation($paddings);
    }

    private function paddings($int): array
    {
        $list = [];

        while (strlen($int) > 3) {
            $divided = $int % 1000;
            $list[] = (string)$divided;
            $int = ($int - $divided) / 1000;
        }

        $list[] = str_pad($int, 3, 0, STR_PAD_LEFT);
        return $list;
    }

    private function makeTranslation(array $paddings): string
    {
        $string = '';
        $translations = $this->getTranslations();
        foreach ($paddings as $thousand => $digits) {
            if (!$digits) {
                continue;
            }
            $hold = '';
            $sorted = array_reverse(str_split($digits));
            foreach ($sorted as $key => $digit) {
                $hold = trim($translations[$key][$digit] . $hold);
            }
            $string = trim($hold . ' ' . $translations[3][$thousand] . ' ' . $string);
        }

        return $this->replacer($string);
    }

    private function getTranslations(): array
    {
        $trans = $this->getTranslationClass();
        return [
            $trans->getUnitsDigits(),
            $trans->getTensDigits(),
            $trans->getHundredsDigits(),
            $trans->getThousandsDigits(),
        ];
    }

    private function getTranslationClass(): Translations
    {
        return new $this->translation();
    }

    private function replacer(string $string)
    {
        $trans = $this->getTranslationClass();
        $replacer = $trans->getReplacer();
        return str_replace($replacer[0], $replacer[1], $string);
    }
}
