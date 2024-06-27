<?php

require "dbConnection.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
if (empty($name) || empty($email)) {
    header("Location: update.php?id=$id&error=emptyfields");
    exit();
}

$sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
$result = mysqli_query($conn, $sql);

header("Location: select.php");