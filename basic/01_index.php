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
<p>Hello World.</p>
<p>Current Time is <?php echo date('Y/m/d H:i:s'); ?></p>
</body>
</html>