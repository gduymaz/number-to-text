<?php

namespace Splendour\NumberToText\Outputs;

use Splendour\NumberToText\Contracts\Output;

class Text extends Output
{

    public function output(): string
    {
        $string = $this->text[0];

        if ($this->text[1]) {
            $string .= ' . ' . $this->text[1];
        }
        return $string;
    }
}
