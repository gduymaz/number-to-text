<?php

namespace Splendour\NumberToText\Tests;

use PHPUnit\Framework\TestCase;
use Splendour\NumberToText\Exceptions\NumberToTextException;
use Splendour\NumberToText\Number;
use Splendour\NumberToText\NumberToText;

class TextTest extends TestCase
{
    public function testtrOutput()
    {
        $text = new NumberToText(1);
        $text->setTranslation('tr');
        $this->assertEquals("bir", $text->toText());

        $text = new NumberToText(13);
        $text->setTranslation('tr');
        $this->assertEquals("onüç", $text->toText());

        $text = new NumberToText(156);
        $text->setTranslation('tr');
        $this->assertEquals("yüzellialtı", $text->toText());

        $text = new NumberToText(106);
        $text->setTranslation('tr');
        $this->assertEquals("yüzaltı", $text->toText());

        $text = new NumberToText(1253);
        $text->setTranslation('tr');
        $this->assertEquals("bin ikiyüzelliüç", $text->toText());

        $text = new NumberToText(8645);
        $text->setTranslation('tr');
        $this->assertEquals("sekiz bin altıyüzkırkbeş", $text->toText());

        $text = new NumberToText(926001);
        $text->setTranslation('tr');
        $this->assertEquals("dokuzyüzyirmialtı bin bir", $text->toText());

        $text = new NumberToText(1000000);
        $text->setTranslation('tr');
        $this->assertEquals("bir milyon", $text->toText());

        $text = new NumberToText(709000801);
        $text->setTranslation('tr');
        $this->assertEquals("yediyüzdokuz milyon sekizyüzbir", $text->toText());

        $text = new NumberToText(8400007192902689081);
        $text->setTranslation('tr');
        $this->assertEquals("sekiz kentilyon dörtyüz katrilyon " .
            "yedi trilyon yüzdoksaniki milyar dokuzyüziki milyon " .
            "altıyüzseksensekiz bin yediyüzaltmışsekiz", $text->toText());

        $text = new NumberToText(6420729122344886326918433610716);
        $text->setTranslation('tr');
        $this->assertEquals("altı nobilyon dörtyüzyirmi oktilyon " .
            "yediyüzyirmidokuz septilyon yüzyirmiiki seksilyon üçyüzkırkdört kentilyon " .
            "sekizyüzseksenaltı katrilyon ikiyüzyetmişiki trilyon yüzaltmışsekiz milyar " .
            "altıyüzonaltı milyon dörtyüzyirmidört bin yüzaltmışsekiz", $text->toText());


        $text = new NumberToText(1253.13);
        $text->setTranslation('tr');
        $this->assertEquals("bin ikiyüzelliüç . onüç", $text->toText());

        $text = new NumberToText(7894184.12515123);
        $text->setTranslation('tr');
        $this->assertEquals("yedi milyon sekizyüzdoksandört bin yüzseksendört . " .
            "bir milyon ikiyüzellibin beşyüzoniki", $text->toText());
    }

    public function testEnglishOutput()
    {
        $text = new NumberToText(1);
        $this->assertEquals("one", $text->toText());

        $text = new NumberToText(11);
        $this->assertEquals("eleven", $text->toText());

        $text = new NumberToText(12);
        $this->assertEquals("twelve", $text->toText());

        $text = new NumberToText(13);
        $this->assertEquals("thirteen", $text->toText());

        $text = new NumberToText(156);
        $this->assertEquals("onehundredfiftysix", $text->toText());

        $text = new NumberToText(106);
        $this->assertEquals("onehundredsix", $text->toText());

        $text = new NumberToText(1253);
        $this->assertEquals("one thousand twohundredfiftythree", $text->toText());

        $text = new NumberToText(8645);
        $this->assertEquals("eight thousand sixhundredfortyfive", $text->toText());

        $text = new NumberToText(926001);
        $this->assertEquals("ninehundredtwentysix thousand one", $text->toText());

        $text = new NumberToText(1000000);
        $this->assertEquals("one million", $text->toText());

        $text = new NumberToText(709000801);
        $this->assertEquals("sevenhundrednine million eighthundredone", $text->toText());

        $text = new NumberToText(8400007192902689081);
        $this->assertEquals("eight quintillion fourhundred quadrillion " .
            "seven trillion onehundredninetytwo billion ninehundredtwo million " .
            "sixhundredeightyeight thousand sevenhundredsixtyeight", $text->toText());

        $text = new NumberToText(6420729122344886326918433610716);
        $this->assertEquals("six nonillion fourhundredtwenty octillion " .
            "sevenhundredtwentynine septillion onehundredtwentytwo sextillion " .
            "threehundredfortyfour quintillion eighthundredeightysix quadrillion " .
            "twohundredseventytwo trillion onehundredsixtyeight billion " .
            "sixhundredsixteen million fourhundredtwentyfour thousand " .
            "onehundredsixtyeight", $text->toText());

        $text = new NumberToText(1253.13);
        $this->assertEquals("one thousand twohundredfiftythree . thirteen", $text->toText());
    }
}
