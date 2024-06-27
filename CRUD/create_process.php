<?php

require "dbConnection.php";
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
    header("location: select.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}