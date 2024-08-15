<?php
namespace Database;
require_once dir(__DIR__)."/database/Connection.php";


trait Response
{
    private function response($status, $message, $data = null):array
    {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    }
}

class User extends Connection
{
    use Response;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUsers(): array
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        if (count($users) > 0) {
            return $this->response("success", "All Users", $users);
        } else {
            return $this->response("error", "No users found");
        }
    }

    public function getUserById($id): array
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        if ($user){
            return $this->response("success", "User", $user);
        }else{
            return $this->response("error", "User not found");
        }
    }

    public function searchUser($search): array
    {
        $sql = "SELECT * FROM users WHERE name LIKE :search OR email LIKE :search";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['search' => "%$search%"]);
        $users = $stmt->fetchAll();
        if (count($users)>0){
            return $this->response("success","Users",$users);
        }else{
            return $this->response("error","No users found");
        }
    }

    public function createUser($name, $email, $password): array
    {
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password]);
        return $this->response("success", "User created successfully");
    }

    public function updateUser($id, $name, $email, $password): array
    {
        $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'name' => $name, 'email' => $email, 'password' => $password]);
        return $this->response("success", "User updated successfully");
    }

    public function deleteUser($id): array
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $this->response("success", "User deleted successfully");
    }

    public function getUserByEmail($email): array
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        return $this->response("success", "User", $user);
    }
}