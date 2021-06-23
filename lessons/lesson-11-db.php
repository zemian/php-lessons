<?php

require '../env.php';
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$stmt = $dbh->query('SELECT version()');
$version = $stmt->fetchColumn();
echo 'DB Connection test: MySQL version = ' . $version;

// See "examples/db-todos.php" for more on CRUD operations.
