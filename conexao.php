<?php

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

echo 'Conectei';

$pdo->exec(
    "INSERT INTO phones(area_code, number, student_id)VALUES('63','44443333',1), ('63','55559999',1);"
);

$createTableSql = 'CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        name TEXT,
        birth_date TEXT
        );

    CREATE TABLE IF NOT EXISTS phones (
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            area_code TEXT,
            number TEXT,
            student_id INTEGER,
            FOREIGN KEY(student_id) REFERENCES students(id)
        );
    ';
$pdo->exec($createTableSql);
