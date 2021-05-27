<?php
// PHP basic types
// PHP is a dynamic language, so you don't have to declare type, but it has runtime type

$n = 99;
echo $n;
var_dump($n);

$n2 = 1234567890;
$n3 = 1234567890123456789;
$f = 3.14;
$f2 = 3.14159265358979323846264338327950288419716939937510;
$flag = true; // false
$s = "foo";
$s2 = 'foo';
var_dump($n, $n2, $n3, $f, $f2, $flag, $s, $s2);

// String substitution/template/interpolation
// Note: you can not do this with single quote
$name = "John";
$greeting = "Hello $name";
echo $greeting;