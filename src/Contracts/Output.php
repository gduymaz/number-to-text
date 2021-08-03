<?php

namespace Splendour\NumberToText\Contracts;

abstract class Output
{
    /**
     * @var array
     */
    protected $text;

    public function __construct(array $text)
    {
        $this->text = $text;
    }

    abstract public function output(): string;
}
