<?php
require '../env.php';
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numOfTodos = $_POST['numOfTodos'];
    $todoTemplate = $_POST['todoTemplate'];
    $stmt = $dbh->prepare('INSERT INTO todos (todo, priority) VALUES (?, ?)');
    for ($i = 0; $i < $numOfTodos; $i++) {
        $todo = "$todoTemplate #$i";
        $stmt->bindValue(1, $todo);
        $stmt->bindValue(2, 'medium');
        $stmt->execute();
    }
}

$stmt = $dbh->query('SELECT count(*) FROM todos');
$todos_count = $stmt->fetchColumn();
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
    <h1 class="title">Generate Todo List</h1>
    <form method="post">
        <div class="field">
            <label class="label">Number of Todos</label>
            <input class="input" type="number" name="numOfTodos">
        </div>
        <div class="field">
            <label class="label">Todo Template</label>
            <input class="input" type="text" name="todoTemplate">
        </div>
        <input type="submit" class="button">
    </form>
</div>

<div class="section">
    <?php
    if (isset($numOfTodos)) {
        echo "<pre>Generated $numOfTodos todos.</pre>";
    }
    ?>
    <pre>There are now total of <?php echo $todos_count; ?> todos.</pre>
</div>

</body>
</html>