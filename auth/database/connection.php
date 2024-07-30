<?php
require_once __DIR__ . '/../vendor/autoload.php';
use  Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$db = $_ENV['DB_NAME'];
$connection = mysqli_connect($host, $user, $pass, $db) or die("Error connecting to database " . mysqli_connect_error());
