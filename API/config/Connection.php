<?php

namespace Database;

use PDO;
use PDOException;

class Connection
{
    private string $host = "localhost";
    private string $user = "root";
    private string $password = "";
    private string $database = "api";
    public bool $isConnected = false;
    public PDO $pdo;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->database;charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->isConnected = true;
            $this->pdo = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

//    public function __destruct()
//    {
//        $this->pdo->;
//        $this->isConnected = false;
//    }
}