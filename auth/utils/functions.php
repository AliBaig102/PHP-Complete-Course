<?php
require dirname(__DIR__) . '/database/connection.php';
function print_pre($data): void
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function secure_input($input): string
{
    global $connection;
    $input = trim($input);
    $input = htmlspecialchars($input);
    return mysqli_real_escape_string($connection, $input);
}

function validate_email($email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_username($username): bool
{
    return preg_match("/^[a-zA-Z0-9]*$/", $username);
}

function validate_password($password): bool
{
    return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})/", $password);
//    the password must contain at least 8 characters, at least one uppercase letter, one lowercase letter, one number, one special character, and no spaces.
}

function empty_input($input): bool
{
    if (empty($input)) {
        return true;
    }
    return false;
}

function myRequire($path): void
{
    $root = dirname(__DIR__) . "/";
    $path = $root . $path;
    require_once $path;
}

//$url_parts = explode("/", $_SERVER['REQUEST_URI']);
function activeLink($url): string
{
    $path = parse_url($_SERVER['REQUEST_URI']);
    $array = explode("/", $path['path']);
    $path = end($array);
    if ($path == $url) {
        return 'active';
    }
    return '';
}

function redirect($path): void
{
    global $application_url;
    echo "<script>window.location.href = '$application_url$path'</script>";
}

function success_and_redirect($success_type, $success, $path): void
{
    unset($_SESSION["success"][$success_type]);
    $_SESSION["success"][$success_type] = $success;
    redirect($path);
}

function success_toast($message, $path): void
{
    $_SESSION["toast"]["success"] = $message;
    redirect($path);
}
function error_toast($message, $path): void
{
    $_SESSION["toast"]["error"] = $message;
    redirect($path);
}