<?php

namespace Splendour\NumberToText\Outputs;

use Splendour\NumberToText\Contracts\Output;
use Splendour\NumberToText\Exceptions\NumberToTextException;

class Money extends Output
{
    /**
     * @var string
     */
    protected $currency;
    /**
     * @var mixed|null
     */
    protected $decimals;

    public function output(): string
    {
        if (empty($this->currency)) {
            throw new NumberToTextException('Currency is not found');
        }
        $string = $this->text[0].' '.$this->currency;
        if ($this->text[1]) {
            if (empty($this->decimals)) {
                throw new NumberToTextException('Decimals is not found');
            }
            $string .= ' '.$this->text[1].' '.$this->decimals;
        }

        return $string;
    }

    public function setCurrency(string $currency, $decimals = null)
    {
        $this->currency = $currency;
        $this->decimals = $decimals;
    }
}
