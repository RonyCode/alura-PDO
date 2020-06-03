<?php

namespace ALura\Pdo\Infrastructure\Persistence;
use PDO;

class ConnectionCreator
{
    public static function createConnection(): \PDO
    {
        $databasePath = __DIR__ . '/../../../banco.sqlite';
        return new PDO('sqlite' . $databasePath);
    }
}
