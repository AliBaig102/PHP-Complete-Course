<?php


class Connection
{
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $db = "crud";
    protected PDO $pdo;

    public function __construct()
    {
        try {
            // connection DSN
            // mysql:host=localhost;dbname=crud
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}