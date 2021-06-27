<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/bulma">
    <script src="../js/vue.js"></script>
    <title>PHP Lessons</title>
</head>
<body>

<div class="section">
    <pre>
        <?php
        require '../env.php';
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stmt = $dbh->query('SELECT version()');
        $version = $stmt->fetchColumn();
        echo 'DB Connection test: MySQL version = ' . $version;
        ?>
    </pre>
</div>

</body>
</html>