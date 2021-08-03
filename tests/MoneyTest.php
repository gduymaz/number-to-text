<?php

namespace Splendour\NumberToText\Tests;

use PHPUnit\Framework\TestCase;
use Splendour\NumberToText\NumberToText;

class MoneyTest extends TestCase
{
    public function testTurkishMoneyOutput()
    {
        $money = new NumberToText(1);
        $money->setTranslation('tr');
        $this->assertEquals('bir TL', $money->toMoney('TL'));

        $money = new NumberToText(4563.24);
        $money->setTranslation('tr');
        $this->assertEquals('dört bin beşyüzaltmışüç lira yirmidört kr', $money->toMoney('lira', 'kr'));
    }

    public function testEnglishMoneyOutput()
    {
        $money = new NumberToText(1);
        $this->assertEquals('one $', $money->toMoney('$'));

        $money = new NumberToText(4563.24);
        $this->assertEquals('four thousand fivehundredsixtythree dollars'.
            ' twentyfour cents', $money->toMoney('dollars', 'cents'));
    }
}
