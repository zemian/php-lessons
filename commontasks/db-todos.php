<?php
/*
 CREATE TABLE todos(
   id SERIAL PRIMARY KEY,
   todo VARCHAR(1000),
   priority ENUM('low', 'medium', 'high'),
   order_num INT DEFAULT 1,
   done BOOLEAN DEFAULT false,
   done_dt DATETIME,
   created_dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
 );
 INSERT INTO todos (todo, priority) VALUES
   ('Learn PHP', 'medium'),
   ('Learn HTML', 'medium'),
   ('Learn CSS', 'medium'),
   ('Learn JS', 'medium');
 */
require '../env.php';
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$todos_stmt = $dbh->query('SELECT * FROM todos ORDER BY created_dt DESC LIMIT 20');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/vue.js"></script>
    <title>PHP Lessons</title>
</head>
<body>

<div class="section">
    <h1 class="title">Todo List</h1>
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