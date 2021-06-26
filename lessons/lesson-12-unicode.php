<?php
/**
 * All programmers should learn: Floating Point Numbers and Unicode!
 *
 * We will explore Unicode here.
 * A must read: https://www.joelonsoftware.com/2003/10/08/the-absolute-minimum-every-software-developer-absolutely-positively-must-know-about-unicode-and-character-sets-no-excuses/
 */

// What is Unicode?
//
// Unicode provides a unique number for every character,
//  no matter what the platform,
//  no matter what the program,
//  no matter what the language.
// https://www.unicode.org/standard/WhatIsUnicode.html

// Unicode comprises 1,114,112 code points in the range 0 to 10FFFF.
// The Unicode code space is divided into seventeen planes
// (the basic multilingual plane, and 16 supplementary planes)
//  each with 65,536 (= 2^16) code points.

// Mapping and Encodings
// https://en.wikipedia.org/wiki/Unicode#
// UTF-8 uses one to four bytes per code point and, being compact for Latin scripts and ASCII-compatible,
//   provides the de facto standard encoding for interchange of Unicode text.
// UTF-16 encodings specify the Unicode Byte Order Mark (BOM) for use at the beginnings of text files,
//   which may be used for byte ordering detection (or byte endianness detection).

// https://en.wikipedia.org/wiki/Comparison_of_Unicode_encodings
// https://en.wikipedia.org/wiki/UTF-8
// UTF-8 requires 8, 16, 24 or 32 bits (one to four bytes) to encode a Unicode character,
// UTF-16 requires either 16 or 32 bits to encode a character, and UTF-32 always requires 32
// bits to encode a character. The first 128 Unicode code points, U+0000 to U+007F, used for the C0
// Controls and Basic Latin characters and which correspond one-to-one to their ASCII-code equivalents,
// are encoded using 8 bits in UTF-8, 16 bits in UTF-16, and 32 bits in UTF-32.
//The next 1,920 characters, U+0080 to U+07FF (encompassing the remainder of almost all Latin-script
// alphabets, and also Greek, Cyrillic, Coptic, Armenian, Hebrew, Arabic, Syriac, Tāna and N'Ko),
// require 16 bits to encode in both UTF-8 and UTF-16, and 32 bits in UTF-32. For U+0800 to U+FFFF,
// i.e. the remainder of the characters in the Basic Multilingual Plane (BMP, plane 0, U+0000 to U+FFFF),
// which encompasses the rest of the characters of most of the world's living languages, UTF-8 needs
// 24 bits to encode a character, while UTF-16 needs 16 bits and UTF-32 needs 32. Code points
// U+010000 to U+10FFFF, which represent characters in the supplementary planes (planes 1-16), require
// 32 bits in UTF-8, UTF-16 and UTF-32.

// How does UTF-8 identify single bytes from other multi bytes characters?
// https://stackoverflow.com/questions/44565859/how-does-utf-8-encoding-identify-single-byte-and-double-byte-characters
//
// UTF-8 is designed to be able to unambiguously identify the type of each byte in a text stream:
//   1-byte codes (all and only the ASCII characters) start with a 0
//   Leading bytes of 2-byte codes start with two 1s followed by a 0 (i.e. 110)
//   Leading bytes of 3-byte codes start with three 1s followed by a 0 (i.e. 1110)
//   Leading bytes of 4-byte codes start with four 1s followed by a 0 (i.e. 11110)
//   * Continuation bytes (of all multi-byte codes) start with a single 1 followed by a 0 (i.e. 10)

// Now it comes to PHP string and Unicode
// PHP string is 8 bits (byte) string. It does not support Unicode natively!
// https://www.php.net/manual/en/language.types.string.php

// PHP 7 support Unicode CodePoint escape syntax
var_dump("\u{aa}");
var_dump("\u{0000aa}");
var_dump("\u{9999}"); // 香
var_dump("\u{1F600}"); // smiley

// IntlChar::chr — Return Unicode character by code point value
// https://www.php.net/manual/en/intlchar.chr.php
$values = ["A", 63, 123, 9731];
foreach ($values as $value) {
    var_dump(IntlChar::chr($value));
}

// How PHP deals with Unicode ("mb" - multibyte) String
// https://www.php.net/manual/en/ref.mbstring.php

// Additional info: Big/Little Endian https://en.wikipedia.org/wiki/Endianness#Files_and_filesystems
// Unicode text can optionally start with a byte order mark (BOM) to signal the endianness
// of the file or stream. Its code point is U+FEFF. In UTF-32 for example, a big-endian file
// should start with 00 00 FE FF; a little-endian should start with FF FE 00 00.

// CJK Unicode
// https://www.key-shortcut.com/en/writing-systems/%E6%96%87%E5%AD%97-chinese-cjk/cjk-characters-1
