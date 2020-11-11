<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Lessons</title>
</head>
<body>

<h1>PHP Lessons</h1>
<table>
    <tr valign="top">
        <td>
            <pre><?php include 'readme.md' ?></pre>
        </td>
        <td>
            <ul>
                <?php
                $files = scandir(".");
                foreach ($files as $file) {
                    // Skip all dot files
                    if (substr_compare($file, '.', 0, 1) === 0)
                        continue;
                    echo "<li><a href='$file'>$file</a></li>";
                }
                ?>
            </ul>
        </td>
    </tr>
</table>

</body>
</html>