# PHP Number to text (words) converter


This library allows you to convert a number to text or money.

## Installation

Add package to your composer.json by running:

```
$ composer require splendour/number-to-text
```

## Usage

This library currently has two types of number-to-text transformations: number and currency. In order to use a specific transformer for certain language you need to create an instance of `NumberToText` class and then call a method which creates a new instance of a transformer;


### Number Transformer

Before using a transformer, it must be created:

```php
use Splendour\NumberToText;

// create the number to text "transformer" class
$transformer = new NumberToText(1);

// set translation using the RFC 3066 language identifier
$transformer->setTranslation('tr'); //en is default
```

Then it can be used with the `toText()` method:

```php
$transformer->toText(); // outputs "one"
```

### Examples
#### Number to text
```
$text = new NumberToText(11);
$text->toText(); //eleven

$text = new NumberToText(1253);
$text->setTranslation('tr');
$text->toText(); //bin ikiyüzelliüç

$text = new NumberToText(6420729122344886326918433610716);
$text->toText(); //six nonillion fourhundredtwenty octillion sevenhundredtwentynine septillion onehundredtwentytwo sextillion threehundredfortyfour quintillion eighthundredeightysix quadrillion twohundredseventytwo trillion onehundredsixtyeight billion sixhundredsixteen million fourhundredtwentyfour thousand onehundredsixtyeight
```

#### Number to money
```
$money = new NumberToText(4563.24);
$money->toMoney('dollars', 'cents') //four thousand fivehundredsixtythree dollars twentyfour cents
```

## Contributing
Thank you for considering contributing.

## License
The project is open-sourced software licensed under the MIT license.

