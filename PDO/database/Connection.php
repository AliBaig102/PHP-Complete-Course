<?php

namespace Database;
use PDO;
use PDOException;

class Connection
{
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $db = "crud";
    protected PDO $connection;

    public function __construct()
    {
        try {
            // connection DSN
            // mysql:host=localhost;dbname=crud
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}