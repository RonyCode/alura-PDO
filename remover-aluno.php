<?php

use ALura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require "vendor/autoload.php";

$pdo = ConnectionCreator::createConnection();

$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$preparedStatement->bindValue(1, 3, PDO::PARAM_INT);
var_dump($preparedStatement->execute());
