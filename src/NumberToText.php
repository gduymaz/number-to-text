<?php

namespace Splendour\NumberToText;

use Splendour\NumberToText\Exceptions\NumberToTextException;
use Splendour\NumberToText\Outputs\Money;
use Splendour\NumberToText\Outputs\Text;
use Splendour\NumberToText\Translations\English;
use Splendour\NumberToText\Translations\Turkish;

class NumberToText
{
    /**
     * @var Number
     */
    protected $number;
    protected $translation = 'en';

    public function __construct($number)
    {
        $this->number = new Number($number);
    }

    public function setTranslation(string $translation)
    {
        $this->translation = $translation;
    }

    public function toText(): string
    {
        $text = new Text($this->convertToText());

        return $text->output();
    }

    public function toMoney($currency, $decimals = null): string
    {
        $money = new Money($this->convertToText());
        $money->setCurrency($currency, $decimals);

        return $money->output();
    }

    private function convertToText(): array
    {
        $convertor = new ConvertToText($this->number, $this->getTranslationClass());

        return $convertor->convert();
    }

    private function getTranslationClass(): string
    {
        $transList = [
            'en' => English::class,
            'tr' => Turkish::class,
        ];
        if (isset($transList[$this->translation])) {
            return $transList[$this->translation];
        } else {
            throw new NumberToTextException('Translation not found');
        }
    }
}
