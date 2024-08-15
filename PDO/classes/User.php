<?php

namespace classes;

use Database\Connection;

class User extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name, $age, $gender)
    {
        $sql = "INSERT INTO users (name, age, gender) VALUES (:name, :age, :gender)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':gender', $gender);
        $stmt->execute();

    }
}