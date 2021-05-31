<?php
/*
Lesson 1
a. html document
b. index.html -> index.php with <?php echo date('Y-m-d H:i:s'); ?>
c. basic php data types and variable
d. echo and var_dump
e. string and substitute

   Exercises:
   1. explore string functions: explode, implode, strlen, strstr, strpos, trim, str_replace, chr
   2. What happen when you do '1' + 2
   3. What happen when you do 'x' + 2
   4. What happen when you do true + 2
 */

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
$greeting2 = "Hello " . $name;
echo $greeting2;

// New line will only work in double string!
$s = "\n";

// Use single quote string to escape double quotes!
// Single quote does not do string substitution!
$s = 'hello';
