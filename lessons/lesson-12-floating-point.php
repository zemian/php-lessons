<?php
/**
 * All programmers should learn: Floating Point Numbers and Unicode!
 *
 * We will explore Floating Point Number here.
 * A must read: https://floating-point-gui.de/formats/fp/
 */

// IMPORTANT:
// Never trust floating number results to the last digit, and do not compare floating point
// numbers directly for equality. If higher precision is necessary, the
// arbitrary precision math functions
// -- source: https://www.php.net/manual/en/language.types.float.php

// The Perceived Problems
$sum = 0.1 + 0.2;
var_dump($sum); // prints float(0.3), but don't let that fool you!
var_dump($sum === 0.3); // prints FALSE!

var_dump(floor((0.1+0.7)*10)); // This returns 7 instead of 8!

// Creating float values
$foo = (float)'10.5';
$bar = 10.5;
var_dump($foo);
var_dump($bar);

// arbitrary precision - require BC Math & Decimal Extension
//$a = new Decimal('0.1');
//var_dump($a);

// Rounding
$number = 4.123;
var_dump(number_format($number, 2)); // prints 4.12

// How to compare float
$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;
if(abs($a-$b) < $epsilon) {
    var_dump("true");
}
