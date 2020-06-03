<?php

use Alura\Pdo\Domain\Model\Student;
use ALura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$student = new Student(
    null,
    "Gisele Pereira",
    new \DateTimeImmutable('1985-09-07')
);
$name = $student->name();

$sqlInsert =
    "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(":name", $student->name());
$statement->bindValue(":birth_date", $student->birthDate()->format('Y-m-d'));

if ($statement->execute()) {
    echo "Aluno incluído";
}
