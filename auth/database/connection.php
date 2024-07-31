<?php
require dirname(__DIR__) . "/vendor/autoload.php";
use  Dotenv\Dotenv;

try {
    $dotenv = Dotenv::createImmutable(__DIR__."/.."); // Adjust path if necessary
    $dotenv->load();
    $host = $_ENV['DB_HOST'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASS'];
    $db = $_ENV['DB_NAME'];

    $connection = mysqli_connect($host, $user, $pass, $db);

    if (!$connection) {
        die("Error connecting to database: " . mysqli_connect_error());
    }
} catch (\Dotenv\Exception\InvalidPathException $e) {
    // Handle .env file error
    echo "Error loading .env file: " . $e->getMessage();
}