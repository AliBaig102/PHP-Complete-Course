<?php
namespace Database;
require_once "Connection.php";

trait apiResponse
{
    private function apiResponse($status, $message, $data = null):string
    {
        return json_encode([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }
}

class User extends Connection
{
    use apiResponse;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUsers(): string
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        if (count($users) > 0) {
            return $this->apiResponse("success", "All Users", $users);
        } else {
            return $this->apiResponse("error", "No users found");
        }
    }

    public function getUserById($id): string
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        if ($user){
            return $this->apiResponse("success", "User", $user);
        }else{
            return $this->apiResponse("error", "User not found");
        }
    }

    public function searchUser($search): string
    {
        $sql = "SELECT * FROM users WHERE name LIKE :search OR email LIKE :search";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['search' => "%$search%"]);
        $users = $stmt->fetchAll();
        if (count($users)>0){
            return $this->apiResponse("success","Users",$users);
        }else{
            return $this->apiResponse("error","No users found");
        }
    }

    public function createUser($name, $email, $password): string
    {
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password]);
        return $this->apiResponse("success", "User created successfully");
    }

    public function updateUser($id, $name, $email, $password): string
    {
        $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'name' => $name, 'email' => $email, 'password' => $password]);
        return $this->apiResponse("success", "User updated successfully");
    }

    public function deleteUser($id): string
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $this->apiResponse("success", "User deleted successfully");
    }

    public function getUserByEmail($email): string
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        return $this->apiResponse("success", "User", $user);
    }

//    public function __destruct()
//    {
//        parent::__destruct();
//    }
}