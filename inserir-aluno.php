<?php

require "vendor/autoload.php";

use Alura\Pdo\Domain\Model\Student;

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$student = new Student(
    null,
    'Rony Anderson',
    new \DateTimeImmutable('1986-02-17')
);
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format(
    'Y-m-d'
)}');";

var_dump($pdo->exec($sqlInsert));
