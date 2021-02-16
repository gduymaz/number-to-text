<?php

namespace Splendour\NumberToText\Contracts;

interface Translations
{

    public function getUnitsDigits(): array;

    public function getTensDigits(): array;

    public function getHundredsDigits(): array;

    public function getThousandsDigits(): array;

    public function getReplacer(): array;
}
