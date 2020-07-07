<?php

$dsn = "mysql:dbname=grafikart;host=localhost";
$user = "root";
$password = "Jesuis1d1gue";

$pdo = new PDO($dsn, $user, $password, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

$pdo->beginTransaction();
$pdo->exec('UPDATE posts set name = "demo" where id = 4');
$pdo->exec('UPDATE posts set content = "demo" where id = 4');
$post = $pdo->query('SELECT * from posts where id = 4')->fetch();
$pdo->rollback();
