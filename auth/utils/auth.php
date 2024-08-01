<?php
require_once "functions.php";
myRequire("database/connection.php");

function register_user($username, $email, $password, $verification_code, $code_expiration): bool
{
    global $connection;
    $sql = "INSERT INTO auth (name,email,password,verification_code,code_expiration) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $verification_code, $code_expiration);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        return true;
    } else {
        return false;
    }
}