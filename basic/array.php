<pre>
<?php
// Collection Type

// Array
$a = [7, 8, 9];
$a2 = array(5, 6, 7);
var_dump("array", $a, $a2, count($a));

// Append
array_push($a, 11);
var_dump("array-append", $a, count($a));

// Remove - Index will NOT BE RESET!
unset($a[0]);
var_dump("array-remove", $a, count($a));

// Associative Array (Map/Dictionary)
$m = array("foo" => 99, "bar" => 88, "baz" => 77);
var_dump("array-map",$m);
