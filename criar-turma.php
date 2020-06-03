<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

$connection->beginTransaction();
try {
    $aStudent = new Student(
        null,
        'Rony Anderson',
        new DateTimeImmutable('1986-02-17')
    );
    $studentRepository->save($aStudent);

    $anotherStudent = new Student(
        null,
        'Denis Robson',
        new DateTimeImmutable('1985-11-26')
    );

    $studentRepository->save($anotherStudent);
    $connection->commit();
} catch (\PDOException $e) {
    echo $e->getMessage();
    $connection->rollBack();
}
