<?php
require_once "functions.php";
myRequire("database/connection.php");

function register_user($username, $email, $password, $verification_code, $code_expiration): bool
{
    global $connection;
    $sql = "INSERT INTO auth (name,email,password,verification_code,code_expiration) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $password, $verification_code, $code_expiration);
    if (!mysqli_stmt_execute($stmt)) {
        return false;
    }
    mysqli_stmt_close($stmt);
    return true;
}

function check_email_verification($email): bool
{
    global $connection;
    $sql = "SELECT is_verified FROM auth WHERE email = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);

    if (!mysqli_stmt_execute($stmt)) {
        return false;
    }

    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        mysqli_stmt_close($stmt);
        if ($row['is_verified'] === 1) {
            return true;
        } else {
            return false;
        }
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function verify_email($email, $verification_code): bool
{
    global $connection;
    $sql = "UPDATE auth SET is_verified = 1 WHERE email = ? AND verification_code = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $verification_code);
    if (!mysqli_stmt_execute($stmt)) {
        return false;
    }
    mysqli_stmt_close($stmt);
    return true;
}

function is_code_expired($email): string
{
    global $connection;
    date_default_timezone_set("Asia/Karachi");
    $current_time = date("Y-m-d H:i:s");
    $sql = "SELECT code_expiration FROM auth WHERE email = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    if (!mysqli_stmt_execute($stmt)) {
        return true;
    }
    $result = mysqli_stmt_get_result($stmt);
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        mysqli_stmt_close($stmt);
        if ($row['code_expiration'] < $current_time) {
            return true;
        } else {
            return false;
        }
    } else {
        mysqli_stmt_close($stmt);
       return true;
    }
}

function login($username_or_email, $password): bool
{
    global $connection;
    $sql = "SELECT password FROM auth WHERE name = ? or email = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username_or_email);
    if (!mysqli_stmt_execute($stmt)) {
        return false;
    }
    $result = mysqli_stmt_get_result($stmt);
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        mysqli_stmt_close($stmt);
        if (password_verify($password, $row['password'])) {
            return true;
        } else {
            return false;
        }
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}