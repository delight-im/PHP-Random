# PHP-Random

The most convenient way to securely generate anything random in PHP

## Requirements

 * PHP 7.0.0+

## Installation

 1. Include the library via Composer [[?]](https://github.com/delight-im/Knowledge/blob/master/Composer%20(PHP).md):

    ```
    $ composer require delight-im/random
    ```

 1. Include the Composer autoloader:

    ```php
    require __DIR__ . '/vendor/autoload.php';
    ```

## Usage

### Generating integers and natural numbers

```php
Random::intBetween(300, 999);
// => e.g. int(510)

// or

Random::intBelow(5);
// => e.g. int(1)

// or

Random::intValue();
// => e.g. int(935477113)
```

### Generating floating-point numbers (floats, doubles or reals)

```php
Random::floatBetween(1, 9);
// => e.g. float(7.6388446512546)

// or

Random::floatBelow(499);
// => e.g. float(281.51015805504)

// or

Random::floatValue();
// => e.g. float(0.05532844200834)
```

### Generating boolean values

```php
Random::boolValue();
// => e.g. bool(true)
```

### Generating raw bytes

```php
Random::bytes(10);
// => e.g. "\x58\x3b\x15\x94\x0a\x78\x52\xd0\x53\xb0"
```

### Generating UUIDs (version 4)

```php
Random::uuid4();
// => e.g. string(36) "892a24f9-c188-4d06-9885-cf5d8de4592b"
```

### Generating hexadecimal strings

```php
Random::hexLowercaseString(2);
// => e.g. string(2) "5f"

// or

Random::hexUppercaseString(7);
// => e.g. string(7) "B0F4B0C"
```

### Generating strings consisting of letters

```php
Random::alphaString(32);
// => e.g. string(32) "GvogcpNdwaxsmOAzKGYwDwqfMOUkZvAn"

// or

Random::alphaHumanString(7);
// => e.g. string(7) "KykrbXb"

// or

Random::alphaLowercaseString(2);
// => e.g. string(2) "ce"

// or

Random::alphaLowercaseHumanString(32);
// => e.g. string(32) "kqbgcmkttvmxjthwpgbhkgdfqhxqmmxh"

// or

Random::alphaUppercaseString(2);
// => e.g. string(2) "IJ"

// or

Random::alphaUppercaseHumanString(7);
// => e.g. string(7) "LJWLLHJ"
```

### Generating strings consisting of letters and numbers

```php
Random::alphanumericString(2);
// => e.g. string(2) "h9"

// or

Random::alphanumericHumanString(7);
// => e.g. string(7) "NF34gd4"

// or

Random::alphanumericLowercaseString(2);
// => e.g. string(2) "4g"

// or

Random::alphanumericLowercaseHumanString(32);
// => e.g. string(32) "wbdt3fdtg9c33dnxxtphp3qd9tgdvhbn"

// or

Random::alphanumericUppercaseString(2);
// => e.g. string(2) "O7"

// or

Random::alphanumericUppercaseHumanString(32);
// => e.g. string(32) "TWFHNNWLNKMPJMYKXHX3TXRCRFTFMYYW"

// or

Random::base32String(7);
// => e.g. string(7) "AZUELC4"

// or

Random::base58String(32);
// => e.g. string(32) "jut9s2LdWHT1EGJeBug3F58oYsaoU85s"
```

### Generating strings consisting of letters, numbers and punctuation

```php
Random::alphanumericAndPunctuationHumanString(32);
// => e.g. string(32) "x%jJ7pWTFwc94ctX3phyy^KT~??H4+JY"

// or

Random::asciiPrintableString(32);
// => e.g. string(32) "N~5_ kP5muxf,HeDY2(W_Bwy^qOkgOXa"

// or

Random::asciiPrintableHumanString(7);
// => e.g. string(7) "_r=kb?v"

// or

Random::base64String(19);
// => e.g. string(19) "I7A/H8D2R54uAo6jCQ3"

// or

Random::base64UrlString(4);
// => e.g. string(4) "_6GS"

// or

Random::base85String(7);
// => e.g. string(7) "j8o6sp:"
```

### Generating strings from arbitrary characters sets or alphabets

```php
Random::stringFromAlphabet('abcd+', 7);
// => e.g. string(7) "ad+cabb"
```

### Dividing output strings into segments

#### Using hyphens as dividers

```php
\Delight\Random\Util::hyphenate('aaaaaaaaaa');
// => string(12) "aaaa-aaaa-aa"

// or

\Delight\Random\Util::hyphenate('bbbbbbbbbb', 3);
// => string(13) "bbb-bbb-bbb-b"
```

#### Using spaces as dividers

```php
\Delight\Random\Util::spaceOut('cccccccccc');
// => string(12) "cccc cccc cc"


// or

\Delight\Random\Util::spaceOut('dddddddddd', 3);
// => string(13) "ddd ddd ddd d"
```

#### Using arbitrary dividers

```php
\Delight\Random\Util::segmentize('eeeeeeeeee', '/');
// => string(12) "eeee/eeee/ee"


// or

\Delight\Random\Util::segmentize('ffffffffff', '/', 3);
// => string(13) "fff/fff/fff/f"
```

## Contributing

All contributions are welcome! If you wish to contribute, please create an issue first so that your feature, problem or question can be discussed.

## License

This project is licensed under the terms of the [MIT License](https://opensource.org/licenses/MIT).
