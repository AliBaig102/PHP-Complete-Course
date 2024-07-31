<?php
require "functions.php";
myRequire("database/connection.php");

function register_user($username, $email, $password): bool
{
    global $connection;
    $sql = "INSERT INTO auth (name,email,password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        return true;
    } else {
        return false;
    }
}