<?php

class UserCrud
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Create
    public function createUser($name, $email)
    {
        $stmt = $this->pdo->prepare('INSERT INTO users (name, email) VALUES (?, ?)');
        $stmt->execute([$name, $email]);
    }

    // Read
    public function getUser($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Update
    public function updateUser($id, $name, $email)
    {
        $stmt = $this->pdo->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?');
        $stmt->execute([$name, $email, $id]);
    }

    // Delete
    public function deleteUser($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$id]);
    }
}

// Example
require_once '../connection/Connection.php';
$pdo = (new Connection())->getPdo();
$user = new UserCrud($pdo);
$user->createUser('John Doe', 'john@example.com');
$userData = $user->getUser(1);
print_r($userData); // Output: Array ( [id] => 1 [name] => John Doe [email] => john@example.com )
$user->updateUser(1, 'Jane Doe', 'jane@example.com');
$user->deleteUser(1);