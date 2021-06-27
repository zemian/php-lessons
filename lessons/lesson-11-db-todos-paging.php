<?php
require '../env.php';

if (isset($_GET['page'])) {
    $page_num = $_GET['page'];
} else {
    $page_num = 1;
}
$limit = 20;
$offset = ($page_num - 1) * $limit;
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$todos_stmt = $dbh->prepare('SELECT * FROM todos ORDER BY created_dt DESC  LIMIT ?, ?');
$todos_stmt->bindValue(1, $offset, PDO::PARAM_INT);
$todos_stmt->bindValue(2, $limit, PDO::PARAM_INT);
$todos_stmt->execute();
?>

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
    <h1 class="title">Todo List</h1>
    <a class="button" href="?page=<?= $page_num + 1 ?>">Next</a>
    <table class="table">
        <tr>
            <td>Todo</td>
            <td>Priority</td>
            <td>Done</td>
            <td>Date</td>
        </tr>
        <?php
        while($row = $todos_stmt->fetch()) {
            ?>
            <tr>
                <td><?= $row['todo'] ?></td>
                <td><?= $row['priority'] ?></td>
                <td><?= $row['done'] ?></td>
                <td><?= $row['created_dt'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

</body>
</html>