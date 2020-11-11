<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basic PHP Language</title>
</head>
<body>
<h1>Basic PHP Language</h1>
<ul>
    <?php
    $uri = $_SERVER['REQUEST_URI'];
    $files = array_slice(scandir("."), 2);
    foreach ($files as $file) {
        echo "<li><a href='$uri/$file'>$file</a></li>";
    }
    ?>
</ul>

</body>
</html>