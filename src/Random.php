<?php declare(strict_types=1);

/*
 * PHP-Random (https://github.com/delight-im/PHP-Random)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\Random;

use Delight\Alphabets\Alphabet;
use Delight\Random\Throwable\InvalidArgumentError;
use Delight\Random\Throwable\InvalidLengthError;
use Delight\Random\Throwable\InvalidRangeError;
use Delight\Random\Throwable\NoSourceOfRandomnessError;

/** Secure and convenient generator of random values for any scalar type */
final class Random {

	/**
	 * Generates a cryptographically secure pseudo-random integer in the specified range
	 *
	 * @param int $min the minimum number that may be returned (inclusive)
	 * @param int $max the maximum number that may be returned (inclusive)
	 * @return int
	 */
	public static function intBetween(int $min, int $max): int {
		try {
			return \random_int($min, $max);
		}
		catch (\TypeError $e) {
			throw new InvalidArgumentError();
		}
		catch (\Error $e) {
			throw new InvalidRangeError();
		}
		catch (\Exception $e) {
			throw new NoSourceOfRandomnessError();
		}
	}

	/**
	 * Generates a cryptographically secure pseudo-random integer between zero and the specified upper limit
	 *
	 * @param int $bound the upper limit (exclusive) for numbers that may be returned
	 * @return int
	 */
	public static function intBelow(int $bound): int {
		return self::intBetween(0, $bound - 1);
	}

	/**
	 * Generates a cryptographically secure pseudo-random integer
	 *
	 * @return int a non-negative number
	 */
	public static function intValue(): int {
		return self::intBetween(0, \PHP_INT_MAX);
	}

	/**
	 * Generates a pseudo-random floating-point number (float, double or real) in the specified range
	 *
	 * @param int $min the minimum number that may be returned (inclusive)
	 * @param int $max the maximum number that may be returned (inclusive)
	 * @return float
	 */
	public static function floatBetween(int $min, int $max): float {
		return $min + self::intBetween(0, \PHP_INT_MAX) / \PHP_INT_MAX * ($max - $min);
	}

	/**
	 * Generates a pseudo-random floating-point number (float, double or real) between zero and the specified upper limit
	 *
	 * @param int $bound the upper limit (exclusive) for numbers that may be returned
	 * @return float
	 */
	public static function floatBelow(int $bound): float {
		return self::floatValue() * $bound;
	}

	/**
	 * Generates a pseudo-random floating-point number (float, double or real)
	 *
	 * @return float a number between 0 (inclusive) and 1 (exclusive)
	 */
	public static function floatValue(): float {
		return self::intBetween(0, \PHP_INT_MAX - 1) / \PHP_INT_MAX;
	}

	/**
	 * Generates a pseudo-random boolean value
	 *
	 * @return bool
	 */
	public static function boolValue(): bool {
		return (bool) self::intBetween(0, 1);
	}

	/**
	 * Generates cryptographically secure pseudo-random bytes
	 *
	 * @param int $n the number of bytes to return
	 * @return string a sequence of bytes
	 */
	public static function bytes(int $n): string {
		try {
			return \random_bytes($n);
		}
		catch (\TypeError $e) {
			throw new InvalidArgumentError();
		}
		catch (\Error $e) {
			throw new InvalidLengthError();
		}
		catch (\Exception $e) {
			throw new NoSourceOfRandomnessError();
		}
	}

	/**
	 * Generates a UUID v4 (version 4, variant 1) with 128 bits (6 predetermined and 122 random) as per RFC 4122
	 *
	 * @return string
	 */
	public static function uuid4(): string {
		// get 128 bits (16 bytes) of random data
		$data = self::bytes(16);
		// in the seventh byte set the first four bits to zero and then set the second bit to one to make the first four bits 0100 (i.e. version 4)
		$data[6] = \chr((\ord($data[6]) & 0b00001111) | 0b01000000);
		// in the ninth byte set the first two bits to zero and then set the first bit to one to make the first two bits 10 (i.e. variant 1)
		$data[8] = \chr((\ord($data[8]) & 0b00111111) | 0b10000000);
		// convert the binary data to a hexadecimal representation
		$hex = \bin2hex($data);
		// split the hexadecimal string into groups of four digits (i.e. two bytes)
		$pairs = \str_split($hex, 4);

		// output 8, 4, 4, 4 and 12 hexadecimal digits (i.e. 4, 2, 2, 2 and 6 bytes) separated by hyphens
		return \vsprintf('%s%s-%s-%s-%s-%s%s%s', $pairs);
	}

	/**
	 * Generates a pseudo-random string of characters from the specified alphabet with the given length
	 *
	 * @param string $alphabet the alphabet as a sequence of unique characters
	 * @param int $length the desired length (i.e. number of digits from the alphabet) of the output
	 * @return string
	 */
	public static function stringFromAlphabet(string $alphabet, int $length): string {
		$str = '';

		// determine the base of the alphabet
		$base = \strlen($alphabet);
		// for every requested character
		for ($i = 0; $i < $length; $i++) {
			// generate a random index within the alphabet
			$index = self::intBelow($base);
			// add the corresponding digit to the output
			$str .= $alphabet[$index];
		}

		return $str;
	}

	/**
	 * Generates a pseudo-random sequence of the 52 letters from the basic Latin alphabet (ISO 646)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphaString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHA, $length);
	}

	/**
	 * Generates a pseudo-random sequence of 33 letters from the basic Latin alphabet (ISO 646), easily readable by humans (i.e. no single-character homoglyphs) and not forming any (offensive) words (i.e. no vowels)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphaHumanString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHA_HUMAN, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 26 small letters from the basic Latin alphabet (ISO 646)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphaLowercaseString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHA_LOWERCASE, $length);
	}

	/**
	 * Generates a pseudo-random sequence of 18 small letters from the basic Latin alphabet (ISO 646), easily readable by humans (i.e. no single-character homoglyphs) and not forming any (offensive) words (i.e. no vowels)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphaLowercaseHumanString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHA_LOWERCASE_HUMAN, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 26 capital letters from the basic Latin alphabet (ISO 646)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphaUppercaseString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHA_UPPERCASE, $length);
	}

	/**
	 * Generates a pseudo-random sequence of 15 capital letters from the basic Latin alphabet (ISO 646), easily readable by humans (i.e. no single-character homoglyphs) and not forming any (offensive) words (i.e. no vowels)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphaUppercaseHumanString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHA_UPPERCASE_HUMAN, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 62 decimal digits and letters from the basic Latin alphabet (ISO 646)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphanumericString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHANUMERIC, $length);
	}

	/**
	 * Generates a pseudo-random sequence of 46 decimal digits, letters from the basic Latin alphabet (ISO 646) and punctuation characters from US-ASCII, easily readable by humans (i.e. no single-character homoglyphs) and not forming any (offensive) words (i.e. no vowels)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphanumericAndPunctuationHumanString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHANUMERIC_AND_PUNCTUATION_HUMAN, $length);
	}

	/**
	 * Generates a pseudo-random sequence of 37 decimal digits and letters from the basic Latin alphabet (ISO 646), easily readable by humans (i.e. no single-character homoglyphs) and not forming any (offensive) words (i.e. no vowels)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphanumericHumanString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHANUMERIC_HUMAN, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 36 decimal digits and small letters from the basic Latin alphabet (ISO 646)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphanumericLowercaseString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHANUMERIC_LOWERCASE, $length);
	}

	/**
	 * Generates a pseudo-random sequence of 22 decimal digits and small letters from the basic Latin alphabet (ISO 646), easily readable by humans (i.e. no single-character homoglyphs) and not forming any (offensive) words (i.e. no vowels)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphanumericLowercaseHumanString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHANUMERIC_LOWERCASE_HUMAN, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 36 decimal digits and capital letters from the basic Latin alphabet (ISO 646)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphanumericUppercaseString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHANUMERIC_UPPERCASE, $length);
	}

	/**
	 * Generates a pseudo-random sequence of 19 decimal digits and capital letters from the basic Latin alphabet (ISO 646), easily readable by humans (i.e. no single-character homoglyphs) and not forming any (offensive) words (i.e. no vowels)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function alphanumericUppercaseHumanString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ALPHANUMERIC_UPPERCASE_HUMAN, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 95 printable characters from US-ASCII
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function asciiPrintableString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ASCII_PRINTABLE, $length);
	}

	/**
	 * Generates a pseudo-random sequence of 51 printable characters from US-ASCII, easily readable by humans (i.e. no single-character homoglyphs) and not forming any (offensive) words (i.e. no vowels)
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function asciiPrintableHumanString(int $length): string {
		return self::stringFromAlphabet(Alphabet::ASCII_PRINTABLE_HUMAN, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 32 characters from the Base32 encoding
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function base32String(int $length): string {
		return self::stringFromAlphabet(Alphabet::BASE_32, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 58 characters from the Base58 encoding
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function base58String(int $length): string {
		return self::stringFromAlphabet(Alphabet::BASE_58, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 64 characters from the Base64 encoding
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function base64String(int $length): string {
		return self::stringFromAlphabet(Alphabet::BASE_64, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 64 characters from the URL-safe (and filename-safe) variant of the Base64 encoding
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function base64UrlString(int $length): string {
		return self::stringFromAlphabet(Alphabet::BASE_64_URL, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 85 characters from the Base85 or Ascii85 encoding
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function base85String(int $length): string {
		return self::stringFromAlphabet(Alphabet::BASE_85, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 16 standard hexadecimal digits with small letters
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function hexLowercaseString(int $length): string {
		return self::stringFromAlphabet(Alphabet::HEX_LOWERCASE, $length);
	}

	/**
	 * Generates a pseudo-random sequence of the 16 standard hexadecimal digits with capital letters
	 *
	 * @param int $length the desired length (i.e. the number of characters) of the output
	 * @return string
	 */
	public static function hexUppercaseString(int $length): string {
		return self::stringFromAlphabet(Alphabet::HEX_UPPERCASE, $length);
	}

	private function __construct() {}

}
