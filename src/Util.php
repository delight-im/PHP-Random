<?php declare(strict_types=1);

/*
 * PHP-Random (https://github.com/delight-im/PHP-Random)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\Random;

use Delight\Random\Throwable\InvalidArgumentError;

/** Helpers and utilities for working with random values */
final class Util {

	/**
	 * Divides the given string into segments with the specified separator in between
	 *
	 * @param string $str the string to divide into segments
	 * @param string $separator the separator to add between segments
	 * @param int|null $chunkLength (optional) the maximum length of individual segments
	 * @return string
	 */
	public static function segmentize(string $str, string $separator, int $chunkLength = null): string {
		if (empty($str)) {
			return '';
		}

		if (!\is_string($str)) {
			throw new InvalidArgumentError();
		}

		if (empty($separator) || !\is_string($separator)) {
			throw new InvalidArgumentError();
		}

		$chunkLength = !empty($chunkLength) ? (int) $chunkLength : 4;

		return \implode($separator, \str_split($str, $chunkLength));
	}

	/**
	 * Divides the given string into segments with hyphens in between
	 *
	 * @param string $str the string to divide into segments
	 * @param int|null $chunkLength (optional) the maximum length of individual segments
	 * @return string
	 */
	public static function hyphenate(string $str, int $chunkLength = null): string {
		return self::segmentize($str, '-', $chunkLength);
	}

	/**
	 * Divides the given string into segments with spaces in between
	 *
	 * @param string $str the string to divide into segments
	 * @param int|null $chunkLength (optional) the maximum length of individual segments
	 * @return string
	 */
	public static function spaceOut(string $str, int $chunkLength = null): string {
		return self::segmentize($str, ' ', $chunkLength);
	}

	private function __construct() {}

}
