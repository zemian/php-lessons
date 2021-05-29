<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Document</title>
</head>
<body>

<pre>
    <?php
    $db = new PDO('mysql:host=localhost;dbname=employees', 'zemian', 'test123');
    $result = $db->query('SELECT count(*) FROM employees');
    $row = $result->fetch();
    print_r( $row );
    ?>
</pre>
</body>
</html>