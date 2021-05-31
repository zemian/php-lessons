<?php
/*
- Install XAMPP and a Text Editor. Start Apache server
   and explore "index.html" or "index.php"
- Introduce "phpinfo" page
- How a plain static 01_index.html and compare to 01_index.php
   (We can use "index.php" in the htdocs folder to continue the lesson.)
- Study the basic html doc structure
- Introduce "<?php ?>" tag
- Look up "date()" function from https://php.net documentation
- Introducing PHP data types, see "01a_data-types.php"

Exercises:
1. explore string functions: explode, implode, strlen, strstr, strpos, trim, str_replace, chr
2. What happen when you do '1' + 2
3. What happen when you do 'x' + 2
4. What happen when you do true + 2
*/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP Lessons</title>
</head>
<body>
<h1>HTML - Hyper Text Markup Language</h1>
<p>Hello World.</p>
<p>Current Time is <?php echo date('Y/m/d H:i:s'); ?></p>

<h1>DataTypes</h1>
<pre>
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
$greeting2 = "Hello " . $name;
echo $greeting2;

// New line will only work in double string!
$s = "\n";

// Use single quote string to escape double quotes!
// Single quote does not do string substitution!
$s = 'hello';
?>
</pre>

</body>
</html>