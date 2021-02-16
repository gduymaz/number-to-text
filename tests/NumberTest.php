<?php

namespace Splendour\NumberToText\Tests;

use PHPUnit\Framework\TestCase;
use Splendour\NumberToText\Exceptions\NumberToTextException;
use Splendour\NumberToText\Number;

class NumberTest extends TestCase
{
    public function testInputIsNumber()
    {
        $number = new Number(1);
        $this->assertEquals(1, $number->getNumber());

        $number = new Number();
        $number->setNumber(1.1);
        $this->assertEquals(1.1, $number->getNumber());

        $number = new Number("1");
        $this->assertEquals(1, $number->getNumber());
    }

    public function testInputIsNotPositive()
    {
        $number = new Number();
        $this->expectException(NumberToTextException::class);
        $number->setNumber(-1);
    }

    public function testInputIsNull()
    {
        $number = new Number();
        $this->expectException(NumberToTextException::class);
        $number->setNumber(null);
    }

    public function testInputIsNotNumber()
    {
        $this->expectException(NumberToTextException::class);
        new Number("a");
    }
}
