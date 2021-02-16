<?php

namespace Splendour\NumberToText;

use Splendour\NumberToText\Exceptions\NumberToTextException;

class Number
{
    protected $number;

    public function __construct($number = null)
    {
        if (!empty($number) && $this->checkNumber($number)) {
            $this->number = $number;
        }
    }

    public function setNumber($number)
    {
        if ($this->checkNumber($number)) {
            $this->number = $number;
        }
    }

    public function getNumber()
    {
        return $this->number;
    }

    private function checkNumber($number): bool
    {
        if (is_numeric($number)) {
            if ($number < 0) {
                throw new NumberToTextException("input value is not a positive number");
            } elseif (strlen(floor($number)) > 31) {
                throw new NumberToTextException("input value is not 32-bit");
            }
            return true;
        }
        throw new NumberToTextException("input value is not a number");
    }
}
