<?php

use Alura\Pdo\Domain\Model\Student;
use ALura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once "vendor/autoload.php";

$pdo = ConnectionCreator::createConnection();

$statement = $pdo->query("SELECT * FROM students;");
$studentDataList = $statement->fetchALL(PDO::FETCH_ASSOC);

$studantList = [];

foreach ($studentDataList as $studentData) {
    $studentList[] = new Student(
        $studentData['id'],
        $studentData['name'],
        new \DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);
