<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once "config/User.php";

use Database\User;

$obj = new User();
$request_method = $_SERVER["REQUEST_METHOD"];

if ($request_method == "GET" && !isset($_GET['id'])) {
    http_response_code(200);
    echo $obj->getAllUsers();
} else if ($request_method == "POST") {
    $data = json_decode(file_get_contents("php://input"),true);
    $name = $data["name"];
    $email = $data["email"];
    $password = $data["password"];
    http_response_code(201);
    echo $obj->createUser($name, $email, $password);
} else if ($request_method == "PUT" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = json_decode(file_get_contents("php://input"),true);
    $name = $data["name"];
    $email = $data["email"];
    $password = $data["password"];
    http_response_code(200);
   echo $obj->updateUser($id, $name, $email, $password);
} else if ($request_method == "DELETE" && isset($_GET['id'])) {
    $id = $_GET['id'];
    http_response_code(200);
    echo $obj->deleteUser($id);
} else if ($request_method == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    http_response_code(200);
    echo $obj->getUserById($id);
} else if ($request_method == "GET" && isset($_GET['search'])) {
    $search = $_GET['search'];
    http_response_code(200);
    echo $obj->searchUser($search);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Not Found"));
}

/*
API EndPoints
http:localhost:4000/index.php => Get all users
http:localhost:4000/index.php?id=1 => Get user by id
http:localhost:4000/index.php?search=John => Search user by name
http:localhost:4000/index.php => Create new user
http:localhost:4000/index.php?id=1 => Update user by id
http:localhost:4000/index.php?id=1 => Delete user by id
*/