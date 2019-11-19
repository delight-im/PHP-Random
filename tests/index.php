<?php declare(strict_types=1);

/*
 * PHP-Random (https://github.com/delight-im/PHP-Random)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

// enable error reporting
\error_reporting(\E_ALL);
\ini_set('display_errors', 'stdout');

// enable assertions
\ini_set('assert.active', '1');
@\ini_set('zend.assertions', '1');
\ini_set('assert.exception', '1');

\header('Content-Type: text/plain; charset=utf-8');

require __DIR__.'/../vendor/autoload.php';

// BEGIN TESTS FOR Random::intBetween

try {
	\Delight\Random\Random::intBetween(8, 2);
	\fail(__LINE__);
}
catch (\Delight\Random\Throwable\InvalidRangeError $ignored) {}

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::intBetween(1, 9);

	\is_int($value) or \fail(__LINE__);
	($value >= 1) or \fail(__LINE__);
	($value <= 9) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) === 9) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.8) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::intBetween(20, 99);

	\is_int($value) or \fail(__LINE__);
	($value >= 20) or \fail(__LINE__);
	($value <= 99) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) === 80) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.4) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::intBetween(300, 999);

	\is_int($value) or \fail(__LINE__);
	($value >= 300) or \fail(__LINE__);
	($value <= 999) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) === 700) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.05) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::intBetween(400000000, 999999999);

	\is_int($value) or \fail(__LINE__);
	($value >= 400000000) or \fail(__LINE__);
	($value <= 999999999) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 5000) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::intBetween(5, 1999999999);

	\is_int($value) or \fail(__LINE__);
	($value >= 5) or \fail(__LINE__);
	($value <= 1999999999) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 7500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

// END TESTS FOR Random::intBetween

echo 'Random::intBetween(1, 9)                           '; \var_dump(\Delight\Random\Random::intBetween(1, 9));
echo 'Random::intBetween(20, 99)                         '; \var_dump(\Delight\Random\Random::intBetween(20, 99));
echo 'Random::intBetween(300, 999)                       '; \var_dump(\Delight\Random\Random::intBetween(300, 999));
echo 'Random::intBetween(400000000, 999999999)           '; \var_dump(\Delight\Random\Random::intBetween(400000000, 999999999));
echo 'Random::intBetween(5, 1999999999)                  '; \var_dump(\Delight\Random\Random::intBetween(5, 1999999999));

echo "\n";

// BEGIN TESTS FOR Random::intBelow

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::intBelow(5);

	\is_int($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value < 5) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) === 5) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.85) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::intBelow(49);

	\is_int($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value < 49) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) === 49) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.6) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::intBelow(399);

	\is_int($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value < 399) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) === 399) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.15) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::intBelow(299999999);

	\is_int($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value < 299999999) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 5000) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::intBelow(1999999999);

	\is_int($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value < 1999999999) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 7500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

// END TESTS FOR Random::intBelow

echo 'Random::intBelow(5)                                '; \var_dump(\Delight\Random\Random::intBelow(5));
echo 'Random::intBelow(49)                               '; \var_dump(\Delight\Random\Random::intBelow(49));
echo 'Random::intBelow(399)                              '; \var_dump(\Delight\Random\Random::intBelow(399));
echo 'Random::intBelow(299999999)                        '; \var_dump(\Delight\Random\Random::intBelow(299999999));
echo 'Random::intBelow(1999999999)                       '; \var_dump(\Delight\Random\Random::intBelow(1999999999));

echo "\n";

// BEGIN TESTS FOR Random::intValue

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::intValue();

	\is_int($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value <= \PHP_INT_MAX) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9000) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

// END TESTS FOR Random::intValue

echo 'Random::intValue()                                 '; \var_dump(\Delight\Random\Random::intValue());

echo "\n";

// BEGIN TESTS FOR Random::floatBetween

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::floatBetween(1, 9);

	\is_float($value) or \fail(__LINE__);
	($value >= 1) or \fail(__LINE__);
	($value <= 9) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::floatBetween(20, 99);

	\is_float($value) or \fail(__LINE__);
	($value >= 20) or \fail(__LINE__);
	($value <= 99) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::floatBetween(300, 999);

	\is_float($value) or \fail(__LINE__);
	($value >= 300) or \fail(__LINE__);
	($value <= 999) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::floatBetween(400000000, 999999999);

	\is_float($value) or \fail(__LINE__);
	($value >= 400000000) or \fail(__LINE__);
	($value <= 999999999) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::floatBetween(5, 1999999999);

	\is_float($value) or \fail(__LINE__);
	($value >= 5) or \fail(__LINE__);
	($value <= 1999999999) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

// END TESTS FOR Random::floatBetween

echo 'Random::floatBetween(1, 9)                         '; \var_dump(\Delight\Random\Random::floatBetween(1, 9));
echo 'Random::floatBetween(20, 99)                       '; \var_dump(\Delight\Random\Random::floatBetween(20, 99));
echo 'Random::floatBetween(300, 999)                     '; \var_dump(\Delight\Random\Random::floatBetween(300, 999));
echo 'Random::floatBetween(400000000, 999999999)         '; \var_dump(\Delight\Random\Random::floatBetween(400000000, 999999999));
echo 'Random::floatBetween(5, 1999999999)                '; \var_dump(\Delight\Random\Random::floatBetween(5, 1999999999));

echo "\n";

// BEGIN TESTS FOR Random::floatBelow

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::floatBelow(5);

	\is_float($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value < 5) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::floatBelow(49);

	\is_float($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value < 49) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::floatBelow(399);

	\is_float($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value < 399) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::floatBelow(299999999);

	\is_float($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value < 299999999) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::floatBelow(1999999999);

	\is_float($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value < 1999999999) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

// END TESTS FOR Random::floatBelow

echo 'Random::floatBelow(5)                              '; \var_dump(\Delight\Random\Random::floatBelow(5));
echo 'Random::floatBelow(49)                             '; \var_dump(\Delight\Random\Random::floatBelow(49));
echo 'Random::floatBelow(399)                            '; \var_dump(\Delight\Random\Random::floatBelow(399));
echo 'Random::floatBelow(299999999)                      '; \var_dump(\Delight\Random\Random::floatBelow(299999999));
echo 'Random::floatBelow(1999999999)                     '; \var_dump(\Delight\Random\Random::floatBelow(1999999999));

echo "\n";

// BEGIN TESTS FOR Random::floatValue

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::floatValue();

	\is_float($value) or \fail(__LINE__);
	($value >= 0) or \fail(__LINE__);
	($value < 1) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9500) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

// END TESTS FOR Random::floatValue

echo 'Random::floatValue()                               '; \var_dump(\Delight\Random\Random::floatValue());

echo "\n";

// BEGIN TESTS FOR Random::boolValue

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::boolValue();

	\is_bool($value) or \fail(__LINE__);

	$value = (int) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) === 2) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.9) or \fail(__LINE__);

// END TESTS FOR Random::boolValue

echo 'Random::boolValue()                                '; \var_dump(\Delight\Random\Random::boolValue());

echo "\n";

// BEGIN TESTS FOR Random::bytes

try {
	\Delight\Random\Random::bytes(-1);
	\fail(__LINE__);
}
catch (\Delight\Random\Throwable\InvalidLengthError $ignored) {}

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::bytes(10);

	\is_string($value) or \fail(__LINE__);
	(\strlen($value) === 10) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9950) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

// END TESTS FOR Random::bytes

echo '\bin2hex(Random::bytes(1))                         '; \var_dump(\bin2hex(\Delight\Random\Random::bytes(1)));
echo '\bin2hex(Random::bytes(2))                         '; \var_dump(\bin2hex(\Delight\Random\Random::bytes(2)));
echo '\bin2hex(Random::bytes(5))                         '; \var_dump(\bin2hex(\Delight\Random\Random::bytes(5)));
echo '\bin2hex(Random::bytes(20))                        '; \var_dump(\bin2hex(\Delight\Random\Random::bytes(20)));

echo "\n";

// BEGIN TESTS FOR Random::uuid4

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::uuid4();

	\is_string($value) or \fail(__LINE__);
	(\strlen($value) === 36) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9990) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

// END TESTS FOR Random::uuid4

echo 'Random::uuid4()                                    '; \var_dump(\Delight\Random\Random::uuid4());

echo "\n";

// BEGIN TESTS FOR Random::stringFromAlphabet

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::stringFromAlphabet('abcd+', 1);

	\is_string($value) or \fail(__LINE__);
	(\strlen($value) === 1) or \fail(__LINE__);
	(\preg_match('/^[abcd+]+$/', $value) === 1) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) === 5) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.85) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::stringFromAlphabet('abcd+', 19);

	\is_string($value) or \fail(__LINE__);
	(\strlen($value) === 19) or \fail(__LINE__);
	(\preg_match('/^[abcd+]+$/', $value) === 1) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9750) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::stringFromAlphabet('abcd+', 64);

	\is_string($value) or \fail(__LINE__);
	(\strlen($value) === 64) or \fail(__LINE__);
	(\preg_match('/^[abcd+]+$/', $value) === 1) or \fail(__LINE__);

	$value = (string) $value;
	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9750) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$sfaCharPool = \Delight\Alphabets\Alphabet::ALPHANUMERIC;

for ($sfaAlphabetIndex = 2; $sfaAlphabetIndex <= \strlen($sfaCharPool); $sfaAlphabetIndex++) {
	$sfaAlphabetChars = \substr($sfaCharPool, 0, $sfaAlphabetIndex);

	for ($sfaLength = 1; $sfaLength <= 72; $sfaLength++) {
		for ($sfaIterations = 0; $sfaIterations < 2; $sfaIterations++) {
			$value = \Delight\Random\Random::stringFromAlphabet($sfaAlphabetChars, $sfaLength);

			\is_string($value) or \fail(__LINE__);
			(\strlen($value) === $sfaLength) or \fail(__LINE__);
		}
	}
}

// END TESTS FOR Random::stringFromAlphabet

echo "Random::stringFromAlphabet('abcd+', 1)             "; \var_dump(\Delight\Random\Random::stringFromAlphabet('abcd+', 1));
echo "Random::stringFromAlphabet('abcd+', 2)             "; \var_dump(\Delight\Random\Random::stringFromAlphabet('abcd+', 2));
echo "Random::stringFromAlphabet('abcd+', 4)             "; \var_dump(\Delight\Random\Random::stringFromAlphabet('abcd+', 4));
echo "Random::stringFromAlphabet('abcd+', 7)             "; \var_dump(\Delight\Random\Random::stringFromAlphabet('abcd+', 7));
echo "Random::stringFromAlphabet('abcd+', 19)            "; \var_dump(\Delight\Random\Random::stringFromAlphabet('abcd+', 19));
echo "Random::stringFromAlphabet('abcd+', 32)            "; \var_dump(\Delight\Random\Random::stringFromAlphabet('abcd+', 32));

echo "\n";

// BEGIN TESTS FOR Random::alphaString

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::alphaString(1);

	\is_string($value) or \fail(__LINE__);
	(\strlen($value) === 1) or \fail(__LINE__);
	(\preg_match('/^[A-Za-z]+$/', $value) === 1) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) === 52) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::alphaString(19);

	\is_string($value) or \fail(__LINE__);
	(\strlen($value) === 19) or \fail(__LINE__);
	(\preg_match('/^[A-Za-z]+$/', $value) === 1) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9900) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::alphaString(64);

	\is_string($value) or \fail(__LINE__);
	(\strlen($value) === 64) or \fail(__LINE__);
	(\preg_match('/^[A-Za-z]+$/', $value) === 1) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9950) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

// END TESTS FOR Random::alphaString

echo 'Random::alphaString(1)                             '; \var_dump(\Delight\Random\Random::alphaString(1));
echo 'Random::alphaString(2)                             '; \var_dump(\Delight\Random\Random::alphaString(2));
echo 'Random::alphaString(4)                             '; \var_dump(\Delight\Random\Random::alphaString(4));
echo 'Random::alphaString(7)                             '; \var_dump(\Delight\Random\Random::alphaString(7));
echo 'Random::alphaString(19)                            '; \var_dump(\Delight\Random\Random::alphaString(19));
echo 'Random::alphaString(32)                            '; \var_dump(\Delight\Random\Random::alphaString(32));

echo "\n";

echo 'Random::alphaHumanString(1)                        '; \var_dump(\Delight\Random\Random::alphaHumanString(1));
echo 'Random::alphaHumanString(2)                        '; \var_dump(\Delight\Random\Random::alphaHumanString(2));
echo 'Random::alphaHumanString(4)                        '; \var_dump(\Delight\Random\Random::alphaHumanString(4));
echo 'Random::alphaHumanString(7)                        '; \var_dump(\Delight\Random\Random::alphaHumanString(7));
echo 'Random::alphaHumanString(19)                       '; \var_dump(\Delight\Random\Random::alphaHumanString(19));
echo 'Random::alphaHumanString(32)                       '; \var_dump(\Delight\Random\Random::alphaHumanString(32));

echo "\n";

echo 'Random::alphaLowercaseString(1)                    '; \var_dump(\Delight\Random\Random::alphaLowercaseString(1));
echo 'Random::alphaLowercaseString(2)                    '; \var_dump(\Delight\Random\Random::alphaLowercaseString(2));
echo 'Random::alphaLowercaseString(4)                    '; \var_dump(\Delight\Random\Random::alphaLowercaseString(4));
echo 'Random::alphaLowercaseString(7)                    '; \var_dump(\Delight\Random\Random::alphaLowercaseString(7));
echo 'Random::alphaLowercaseString(19)                   '; \var_dump(\Delight\Random\Random::alphaLowercaseString(19));
echo 'Random::alphaLowercaseString(32)                   '; \var_dump(\Delight\Random\Random::alphaLowercaseString(32));

echo "\n";

echo 'Random::alphaLowercaseHumanString(1)               '; \var_dump(\Delight\Random\Random::alphaLowercaseHumanString(1));
echo 'Random::alphaLowercaseHumanString(2)               '; \var_dump(\Delight\Random\Random::alphaLowercaseHumanString(2));
echo 'Random::alphaLowercaseHumanString(4)               '; \var_dump(\Delight\Random\Random::alphaLowercaseHumanString(4));
echo 'Random::alphaLowercaseHumanString(7)               '; \var_dump(\Delight\Random\Random::alphaLowercaseHumanString(7));
echo 'Random::alphaLowercaseHumanString(19)              '; \var_dump(\Delight\Random\Random::alphaLowercaseHumanString(19));
echo 'Random::alphaLowercaseHumanString(32)              '; \var_dump(\Delight\Random\Random::alphaLowercaseHumanString(32));

echo "\n";

echo 'Random::alphaUppercaseString(1)                    '; \var_dump(\Delight\Random\Random::alphaUppercaseString(1));
echo 'Random::alphaUppercaseString(2)                    '; \var_dump(\Delight\Random\Random::alphaUppercaseString(2));
echo 'Random::alphaUppercaseString(4)                    '; \var_dump(\Delight\Random\Random::alphaUppercaseString(4));
echo 'Random::alphaUppercaseString(7)                    '; \var_dump(\Delight\Random\Random::alphaUppercaseString(7));
echo 'Random::alphaUppercaseString(19)                   '; \var_dump(\Delight\Random\Random::alphaUppercaseString(19));
echo 'Random::alphaUppercaseString(32)                   '; \var_dump(\Delight\Random\Random::alphaUppercaseString(32));

echo "\n";

echo 'Random::alphaUppercaseHumanString(1)               '; \var_dump(\Delight\Random\Random::alphaUppercaseHumanString(1));
echo 'Random::alphaUppercaseHumanString(2)               '; \var_dump(\Delight\Random\Random::alphaUppercaseHumanString(2));
echo 'Random::alphaUppercaseHumanString(4)               '; \var_dump(\Delight\Random\Random::alphaUppercaseHumanString(4));
echo 'Random::alphaUppercaseHumanString(7)               '; \var_dump(\Delight\Random\Random::alphaUppercaseHumanString(7));
echo 'Random::alphaUppercaseHumanString(19)              '; \var_dump(\Delight\Random\Random::alphaUppercaseHumanString(19));
echo 'Random::alphaUppercaseHumanString(32)              '; \var_dump(\Delight\Random\Random::alphaUppercaseHumanString(32));

echo "\n";

echo 'Random::alphanumericString(1)                      '; \var_dump(\Delight\Random\Random::alphanumericString(1));
echo 'Random::alphanumericString(2)                      '; \var_dump(\Delight\Random\Random::alphanumericString(2));
echo 'Random::alphanumericString(4)                      '; \var_dump(\Delight\Random\Random::alphanumericString(4));
echo 'Random::alphanumericString(7)                      '; \var_dump(\Delight\Random\Random::alphanumericString(7));
echo 'Random::alphanumericString(19)                     '; \var_dump(\Delight\Random\Random::alphanumericString(19));
echo 'Random::alphanumericString(32)                     '; \var_dump(\Delight\Random\Random::alphanumericString(32));

echo "\n";

echo 'Random::alphanumericAndPunctuationHumanString(1)   '; \var_dump(\Delight\Random\Random::alphanumericAndPunctuationHumanString(1));
echo 'Random::alphanumericAndPunctuationHumanString(2)   '; \var_dump(\Delight\Random\Random::alphanumericAndPunctuationHumanString(2));
echo 'Random::alphanumericAndPunctuationHumanString(4)   '; \var_dump(\Delight\Random\Random::alphanumericAndPunctuationHumanString(4));
echo 'Random::alphanumericAndPunctuationHumanString(7)   '; \var_dump(\Delight\Random\Random::alphanumericAndPunctuationHumanString(7));
echo 'Random::alphanumericAndPunctuationHumanString(19)  '; \var_dump(\Delight\Random\Random::alphanumericAndPunctuationHumanString(19));
echo 'Random::alphanumericAndPunctuationHumanString(32)  '; \var_dump(\Delight\Random\Random::alphanumericAndPunctuationHumanString(32));

echo "\n";

echo 'Random::alphanumericHumanString(1)                 '; \var_dump(\Delight\Random\Random::alphanumericHumanString(1));
echo 'Random::alphanumericHumanString(2)                 '; \var_dump(\Delight\Random\Random::alphanumericHumanString(2));
echo 'Random::alphanumericHumanString(4)                 '; \var_dump(\Delight\Random\Random::alphanumericHumanString(4));
echo 'Random::alphanumericHumanString(7)                 '; \var_dump(\Delight\Random\Random::alphanumericHumanString(7));
echo 'Random::alphanumericHumanString(19)                '; \var_dump(\Delight\Random\Random::alphanumericHumanString(19));
echo 'Random::alphanumericHumanString(32)                '; \var_dump(\Delight\Random\Random::alphanumericHumanString(32));

echo "\n";

echo 'Random::alphanumericLowercaseString(1)             '; \var_dump(\Delight\Random\Random::alphanumericLowercaseString(1));
echo 'Random::alphanumericLowercaseString(2)             '; \var_dump(\Delight\Random\Random::alphanumericLowercaseString(2));
echo 'Random::alphanumericLowercaseString(4)             '; \var_dump(\Delight\Random\Random::alphanumericLowercaseString(4));
echo 'Random::alphanumericLowercaseString(7)             '; \var_dump(\Delight\Random\Random::alphanumericLowercaseString(7));
echo 'Random::alphanumericLowercaseString(19)            '; \var_dump(\Delight\Random\Random::alphanumericLowercaseString(19));
echo 'Random::alphanumericLowercaseString(32)            '; \var_dump(\Delight\Random\Random::alphanumericLowercaseString(32));

echo "\n";

echo 'Random::alphanumericLowercaseHumanString(1)        '; \var_dump(\Delight\Random\Random::alphanumericLowercaseHumanString(1));
echo 'Random::alphanumericLowercaseHumanString(2)        '; \var_dump(\Delight\Random\Random::alphanumericLowercaseHumanString(2));
echo 'Random::alphanumericLowercaseHumanString(4)        '; \var_dump(\Delight\Random\Random::alphanumericLowercaseHumanString(4));
echo 'Random::alphanumericLowercaseHumanString(7)        '; \var_dump(\Delight\Random\Random::alphanumericLowercaseHumanString(7));
echo 'Random::alphanumericLowercaseHumanString(19)       '; \var_dump(\Delight\Random\Random::alphanumericLowercaseHumanString(19));
echo 'Random::alphanumericLowercaseHumanString(32)       '; \var_dump(\Delight\Random\Random::alphanumericLowercaseHumanString(32));

echo "\n";

echo 'Random::alphanumericUppercaseString(1)             '; \var_dump(\Delight\Random\Random::alphanumericUppercaseString(1));
echo 'Random::alphanumericUppercaseString(2)             '; \var_dump(\Delight\Random\Random::alphanumericUppercaseString(2));
echo 'Random::alphanumericUppercaseString(4)             '; \var_dump(\Delight\Random\Random::alphanumericUppercaseString(4));
echo 'Random::alphanumericUppercaseString(7)             '; \var_dump(\Delight\Random\Random::alphanumericUppercaseString(7));
echo 'Random::alphanumericUppercaseString(19)            '; \var_dump(\Delight\Random\Random::alphanumericUppercaseString(19));
echo 'Random::alphanumericUppercaseString(32)            '; \var_dump(\Delight\Random\Random::alphanumericUppercaseString(32));

echo "\n";

echo 'Random::alphanumericUppercaseHumanString(1)        '; \var_dump(\Delight\Random\Random::alphanumericUppercaseHumanString(1));
echo 'Random::alphanumericUppercaseHumanString(2)        '; \var_dump(\Delight\Random\Random::alphanumericUppercaseHumanString(2));
echo 'Random::alphanumericUppercaseHumanString(4)        '; \var_dump(\Delight\Random\Random::alphanumericUppercaseHumanString(4));
echo 'Random::alphanumericUppercaseHumanString(7)        '; \var_dump(\Delight\Random\Random::alphanumericUppercaseHumanString(7));
echo 'Random::alphanumericUppercaseHumanString(19)       '; \var_dump(\Delight\Random\Random::alphanumericUppercaseHumanString(19));
echo 'Random::alphanumericUppercaseHumanString(32)       '; \var_dump(\Delight\Random\Random::alphanumericUppercaseHumanString(32));

echo "\n";

// BEGIN TESTS FOR Random::asciiPrintableString

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::asciiPrintableString(1);

	\is_string($value) or \fail(__LINE__);
	(\strlen($value) === 1) or \fail(__LINE__);
	(\preg_match('/^[\x20-\x7e]+$/', $value) === 1) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) === 95) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.35) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::asciiPrintableString(19);

	\is_string($value) or \fail(__LINE__);
	(\strlen($value) === 19) or \fail(__LINE__);
	(\preg_match('/^[\x20-\x7e]+$/', $value) === 1) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9950) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

$values = [];

for ($i = 0; $i < 10000; $i++) {
	$value = \Delight\Random\Random::asciiPrintableString(64);

	\is_string($value) or \fail(__LINE__);
	(\strlen($value) === 64) or \fail(__LINE__);
	(\preg_match('/^[\x20-\x7e]+$/', $value) === 1) or \fail(__LINE__);

	$values[$value] = isset($values[$value]) ? $values[$value] + 1 : 1;
}

(\count($values) >= 9990) or \fail(__LINE__);
((\min($values) / \max($values)) >= 0.5) or \fail(__LINE__);

// END TESTS FOR Random::asciiPrintableString

echo 'Random::asciiPrintableString(1)                    '; \var_dump(\Delight\Random\Random::asciiPrintableString(1));
echo 'Random::asciiPrintableString(2)                    '; \var_dump(\Delight\Random\Random::asciiPrintableString(2));
echo 'Random::asciiPrintableString(4)                    '; \var_dump(\Delight\Random\Random::asciiPrintableString(4));
echo 'Random::asciiPrintableString(7)                    '; \var_dump(\Delight\Random\Random::asciiPrintableString(7));
echo 'Random::asciiPrintableString(19)                   '; \var_dump(\Delight\Random\Random::asciiPrintableString(19));
echo 'Random::asciiPrintableString(32)                   '; \var_dump(\Delight\Random\Random::asciiPrintableString(32));

echo "\n";

echo 'Random::asciiPrintableHumanString(1)               '; \var_dump(\Delight\Random\Random::asciiPrintableHumanString(1));
echo 'Random::asciiPrintableHumanString(2)               '; \var_dump(\Delight\Random\Random::asciiPrintableHumanString(2));
echo 'Random::asciiPrintableHumanString(4)               '; \var_dump(\Delight\Random\Random::asciiPrintableHumanString(4));
echo 'Random::asciiPrintableHumanString(7)               '; \var_dump(\Delight\Random\Random::asciiPrintableHumanString(7));
echo 'Random::asciiPrintableHumanString(19)              '; \var_dump(\Delight\Random\Random::asciiPrintableHumanString(19));
echo 'Random::asciiPrintableHumanString(32)              '; \var_dump(\Delight\Random\Random::asciiPrintableHumanString(32));

echo "\n";

echo 'Random::base32String(1)                            '; \var_dump(\Delight\Random\Random::base32String(1));
echo 'Random::base32String(2)                            '; \var_dump(\Delight\Random\Random::base32String(2));
echo 'Random::base32String(4)                            '; \var_dump(\Delight\Random\Random::base32String(4));
echo 'Random::base32String(7)                            '; \var_dump(\Delight\Random\Random::base32String(7));
echo 'Random::base32String(19)                           '; \var_dump(\Delight\Random\Random::base32String(19));
echo 'Random::base32String(32)                           '; \var_dump(\Delight\Random\Random::base32String(32));

echo "\n";

echo 'Random::base58String(1)                            '; \var_dump(\Delight\Random\Random::base58String(1));
echo 'Random::base58String(2)                            '; \var_dump(\Delight\Random\Random::base58String(2));
echo 'Random::base58String(4)                            '; \var_dump(\Delight\Random\Random::base58String(4));
echo 'Random::base58String(7)                            '; \var_dump(\Delight\Random\Random::base58String(7));
echo 'Random::base58String(19)                           '; \var_dump(\Delight\Random\Random::base58String(19));
echo 'Random::base58String(32)                           '; \var_dump(\Delight\Random\Random::base58String(32));

echo "\n";

echo 'Random::base64String(1)                            '; \var_dump(\Delight\Random\Random::base64String(1));
echo 'Random::base64String(2)                            '; \var_dump(\Delight\Random\Random::base64String(2));
echo 'Random::base64String(4)                            '; \var_dump(\Delight\Random\Random::base64String(4));
echo 'Random::base64String(7)                            '; \var_dump(\Delight\Random\Random::base64String(7));
echo 'Random::base64String(19)                           '; \var_dump(\Delight\Random\Random::base64String(19));
echo 'Random::base64String(32)                           '; \var_dump(\Delight\Random\Random::base64String(32));

echo "\n";

echo 'Random::base64UrlString(1)                         '; \var_dump(\Delight\Random\Random::base64UrlString(1));
echo 'Random::base64UrlString(2)                         '; \var_dump(\Delight\Random\Random::base64UrlString(2));
echo 'Random::base64UrlString(4)                         '; \var_dump(\Delight\Random\Random::base64UrlString(4));
echo 'Random::base64UrlString(7)                         '; \var_dump(\Delight\Random\Random::base64UrlString(7));
echo 'Random::base64UrlString(19)                        '; \var_dump(\Delight\Random\Random::base64UrlString(19));
echo 'Random::base64UrlString(32)                        '; \var_dump(\Delight\Random\Random::base64UrlString(32));

echo "\n";

echo 'Random::base85String(1)                            '; \var_dump(\Delight\Random\Random::base85String(1));
echo 'Random::base85String(2)                            '; \var_dump(\Delight\Random\Random::base85String(2));
echo 'Random::base85String(4)                            '; \var_dump(\Delight\Random\Random::base85String(4));
echo 'Random::base85String(7)                            '; \var_dump(\Delight\Random\Random::base85String(7));
echo 'Random::base85String(19)                           '; \var_dump(\Delight\Random\Random::base85String(19));
echo 'Random::base85String(32)                           '; \var_dump(\Delight\Random\Random::base85String(32));

echo "\n";

echo 'Random::hexLowercaseString(1)                      '; \var_dump(\Delight\Random\Random::hexLowercaseString(1));
echo 'Random::hexLowercaseString(2)                      '; \var_dump(\Delight\Random\Random::hexLowercaseString(2));
echo 'Random::hexLowercaseString(4)                      '; \var_dump(\Delight\Random\Random::hexLowercaseString(4));
echo 'Random::hexLowercaseString(7)                      '; \var_dump(\Delight\Random\Random::hexLowercaseString(7));
echo 'Random::hexLowercaseString(19)                     '; \var_dump(\Delight\Random\Random::hexLowercaseString(19));
echo 'Random::hexLowercaseString(32)                     '; \var_dump(\Delight\Random\Random::hexLowercaseString(32));

echo "\n";

echo 'Random::hexUppercaseString(1)                      '; \var_dump(\Delight\Random\Random::hexUppercaseString(1));
echo 'Random::hexUppercaseString(2)                      '; \var_dump(\Delight\Random\Random::hexUppercaseString(2));
echo 'Random::hexUppercaseString(4)                      '; \var_dump(\Delight\Random\Random::hexUppercaseString(4));
echo 'Random::hexUppercaseString(7)                      '; \var_dump(\Delight\Random\Random::hexUppercaseString(7));
echo 'Random::hexUppercaseString(19)                     '; \var_dump(\Delight\Random\Random::hexUppercaseString(19));
echo 'Random::hexUppercaseString(32)                     '; \var_dump(\Delight\Random\Random::hexUppercaseString(32));

echo "\n";

echo 'Wi-Fi > SSID > Short                               ' . \Delight\Random\Random::alphanumericUppercaseHumanString(8) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericUppercaseHumanString(8)) . "\n";
echo 'Wi-Fi > SSID > Moderate                            ' . \Delight\Random\Random::alphanumericUppercaseHumanString(16) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericUppercaseHumanString(16)) . "\n";
echo 'Wi-Fi > SSID > Long                                ' . \Delight\Random\Random::alphanumericUppercaseHumanString(24) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericUppercaseHumanString(24)) . "\n";
echo 'Wi-Fi > SSID > Full                                ' . \Delight\Random\Random::alphanumericUpperCaseHumanString(32) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(32) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericAndPunctuationHumanString(32) . "\n";

echo "\n";

echo 'Wi-Fi > Password > Very short                      ' . \Delight\Random\Random::alphanumericLowercaseHumanString(8) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(8)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(8) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericHumanString(8)) . "\n";
echo 'Wi-Fi > Password > Short                           ' . \Delight\Random\Random::alphanumericLowercaseHumanString(12) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(12)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(12) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericHumanString(12)) . "\n";
echo 'Wi-Fi > Password > Moderate                        ' . \Delight\Random\Random::alphanumericLowercaseHumanString(16) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(16)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(16) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericHumanString(16)) . "\n";
echo 'Wi-Fi > Password > Slightly Long                   ' . \Delight\Random\Random::alphanumericLowercaseHumanString(20) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(20)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(20) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericHumanString(20)) . "\n";
echo 'Wi-Fi > Password > Long                            ' . \Delight\Random\Random::alphanumericLowercaseHumanString(24) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(24)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(24) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericHumanString(24)) . "\n";
echo 'Wi-Fi > Password > Very long                       ' . \Delight\Random\Random::alphanumericLowercaseHumanString(32) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(32)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(32) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericHumanString(32)) . "\n";
echo 'Wi-Fi > Password > Extremely long                  ' . \Delight\Random\Random::alphanumericLowercaseHumanString(40) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(40)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(40) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericHumanString(40)) . "\n";
echo 'Wi-Fi > Password > Full                            ' . \Delight\Random\Random::alphanumericLowercaseHumanString(63) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(63) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericAndPunctuationHumanString(63) . "\n";

echo "\n";

echo 'Device name > Windows > Short                      ' . \Delight\Random\Random::alphanumericLowercaseHumanString(4) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(4) . "\n";
echo 'Device name > Windows > Moderate                   ' . \Delight\Random\Random::alphanumericLowercaseHumanString(8) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(8)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(8) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(8), '_') . "\n";
echo 'Device name > Windows > Long                       ' . \Delight\Random\Random::alphanumericLowercaseHumanString(12) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(12)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(12) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(12), '_') . "\n";
echo 'Device name > Windows > Full                       ' . \Delight\Random\Random::alphanumericLowercaseHumanString(15) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(15) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(15) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericAndPunctuationHumanString(15) . "\n";

echo "\n";

echo 'Device name > Linux > Very short                   ' . \Delight\Random\Random::alphanumericLowercaseHumanString(8) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(8)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(8) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(8), '_') . "\n";
echo 'Device name > Linux > Short                        ' . \Delight\Random\Random::alphanumericLowercaseHumanString(12) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(12)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(12) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(12), '_') . "\n";
echo 'Device name > Linux > Moderate                     ' . \Delight\Random\Random::alphanumericLowercaseHumanString(16) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(16)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(16) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(16), '_') . "\n";
echo 'Device name > Linux > Long                         ' . \Delight\Random\Random::alphanumericLowercaseHumanString(32) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(32)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(32) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(32), '_') . "\n";
echo 'Device name > Linux > Very long                    ' . \Delight\Random\Random::alphanumericLowercaseHumanString(48) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(48)) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(48) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(48), '_') . "\n";
echo 'Device name > Linux > Full                         ' . \Delight\Random\Random::alphanumericLowercaseHumanString(63) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(63) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(63) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericAndPunctuationHumanString(63) . "\n";

echo "\n";

echo 'Device name > NTFS > Volume > Short                ' . \Delight\Random\Random::alphanumericLowercaseHumanString(6) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(6), 3) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(6) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(6), '_', 3) . "\n";
echo 'Device name > NTFS > Volume > Moderate             ' . \Delight\Random\Random::alphanumericLowercaseHumanString(15) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(15), 3) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(15) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(15), '_', 3) . "\n";
echo 'Device name > NTFS > Volume > Long                 ' . \Delight\Random\Random::alphanumericLowercaseHumanString(24) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(24), 3) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(24) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(24), '_', 3) . "\n";
echo 'Device name > NTFS > Volume > Full                 ' . \Delight\Random\Random::alphanumericLowercaseHumanString(32) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(32) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(32) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericAndPunctuationHumanString(32) . "\n";

echo "\n";

echo 'Device name > exFAT > Volume > Short               ' . \Delight\Random\Random::alphanumericLowercaseHumanString(6) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(6), 3) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(6) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(6), '_', 3) . "\n";
echo 'Device name > exFAT > Volume > Long                ' . \Delight\Random\Random::alphanumericLowercaseHumanString(9) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(9), 3) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(9) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(9), '_', 3) . "\n";
echo 'Device name > exFAT > Volume > Full                ' . \Delight\Random\Random::alphanumericLowercaseHumanString(11) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(11) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(11) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericAndPunctuationHumanString(11) . "\n";

echo "\n";

echo 'Device name > FAT32 > Volume > Short               ' . \Delight\Random\Random::alphanumericLowercaseHumanString(6) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(6), 3) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(6) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(6), '_', 3) . "\n";
echo 'Device name > FAT32 > Volume > Long                ' . \Delight\Random\Random::alphanumericLowercaseHumanString(9) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(9), 3) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(9) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(9), '_', 3) . "\n";
echo 'Device name > FAT32 > Volume > Full                ' . \Delight\Random\Random::alphanumericLowercaseHumanString(11) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(11) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(11) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericAndPunctuationHumanString(11) . "\n";

echo "\n";

echo 'Device name > ext4 > Volume > Short                ' . \Delight\Random\Random::alphanumericLowercaseHumanString(6) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(6), 3) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(6) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(6), '_', 3) . "\n";
echo 'Device name > ext4 > Volume > Moderate             ' . \Delight\Random\Random::alphanumericLowercaseHumanString(9) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(9), 3) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(9) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(9), '_', 3) . "\n";
echo 'Device name > ext4 > Volume > Long                 ' . \Delight\Random\Random::alphanumericLowercaseHumanString(12) . "\n";
echo '                                                   ' . \Delight\Random\Util::hyphenate(\Delight\Random\Random::alphanumericLowercaseHumanString(12), 3) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(12) . "\n";
echo '                                                   ' . \Delight\Random\Util::segmentize(\Delight\Random\Random::alphanumericUppercaseHumanString(12), '_', 3) . "\n";
echo 'Device name > ext4 > Volume > Full                 ' . \Delight\Random\Random::alphanumericLowercaseHumanString(16) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericUppercaseHumanString(16) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericHumanString(16) . "\n";
echo '                                                   ' . \Delight\Random\Random::alphanumericAndPunctuationHumanString(16) . "\n";

echo "\n";

echo 'Color > RGB > Tuple                                ' . \sprintf('(%d, %d, %d)', \Delight\Random\Random::intBelow(256), \Delight\Random\Random::intBelow(256), \Delight\Random\Random::intBelow(256)) . "\n";
echo 'Color > RGB > Hex                                  ' . \sprintf('#%02x%02x%02x', \Delight\Random\Random::intBelow(256), \Delight\Random\Random::intBelow(256), \Delight\Random\Random::intBelow(256)) . "\n";

echo "\n";

echo 'Color > RGBA > Tuple                               ' . \sprintf('(%d, %d, %d, %d)', \Delight\Random\Random::intBelow(256), \Delight\Random\Random::intBelow(256), \Delight\Random\Random::intBelow(256), \Delight\Random\Random::intBelow(256)) . "\n";
echo 'Color > RGBA > Hex                                 ' . \sprintf('#%02x%02x%02x%02x', \Delight\Random\Random::intBelow(256), \Delight\Random\Random::intBelow(256), \Delight\Random\Random::intBelow(256), \Delight\Random\Random::intBelow(256)) . "\n";

echo "\n";

// BEGIN TESTS FOR Util::hyphenate

(\Delight\Random\Util::hyphenate('') === '') or \fail(__LINE__);
(\Delight\Random\Util::hyphenate('a') === 'a') or \fail(__LINE__);
(\Delight\Random\Util::hyphenate('ab') === 'ab') or \fail(__LINE__);
(\Delight\Random\Util::hyphenate('abc') === 'abc') or \fail(__LINE__);
(\Delight\Random\Util::hyphenate('abcd') === 'abcd') or \fail(__LINE__);
(\Delight\Random\Util::hyphenate('abcde') === 'abcd-e') or \fail(__LINE__);
(\Delight\Random\Util::hyphenate('abcdef') === 'abcd-ef') or \fail(__LINE__);
(\Delight\Random\Util::hyphenate('abcdefg') === 'abcd-efg') or \fail(__LINE__);
(\Delight\Random\Util::hyphenate('abcdefgh') === 'abcd-efgh') or \fail(__LINE__);
(\Delight\Random\Util::hyphenate('abcdefghi') === 'abcd-efgh-i') or \fail(__LINE__);

// END TESTS FOR Util::hyphenate

// BEGIN TESTS FOR Util::spaceOut

(\Delight\Random\Util::spaceOut('') === '') or \fail(__LINE__);
(\Delight\Random\Util::spaceOut('a') === 'a') or \fail(__LINE__);
(\Delight\Random\Util::spaceOut('ab') === 'ab') or \fail(__LINE__);
(\Delight\Random\Util::spaceOut('abc') === 'abc') or \fail(__LINE__);
(\Delight\Random\Util::spaceOut('abcd') === 'abcd') or \fail(__LINE__);
(\Delight\Random\Util::spaceOut('abcde') === 'abcd e') or \fail(__LINE__);
(\Delight\Random\Util::spaceOut('abcdef') === 'abcd ef') or \fail(__LINE__);
(\Delight\Random\Util::spaceOut('abcdefg') === 'abcd efg') or \fail(__LINE__);
(\Delight\Random\Util::spaceOut('abcdefgh') === 'abcd efgh') or \fail(__LINE__);
(\Delight\Random\Util::spaceOut('abcdefghi') === 'abcd efgh i') or \fail(__LINE__);

// END TESTS FOR Util::spaceOut

echo 'ALL TESTS PASSED' . "\n";

function fail(int $lineNumber) {
	exit('Error on line ' . $lineNumber);
}
