<?php

use Alura\Pdo\Domain\Model\Student;

require "vendor/autoload.php";

$caminhoBanco = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $caminhoBanco);

$student = new Student(
    null,
    'Rony Anderson',
    new \DateTimeImmutable('1997-10-15')
);
$sqlInsert = "INSERT INTO studens (name, birth_date) VALUES ('{$student->name()}')','{$student->birthDate()->format(
    'Y-m-d'
)}');";
var_dump($pdo->exec($sqlInsert));

echo $sqlInsert;
