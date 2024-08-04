<?php
require_once dirname(__DIR__)."/constant/constant.php";
function generate_token_and_expiration($email): array
{
    global $application_url;
    date_default_timezone_set("Asia/Karachi");
    $code_expiration = date("Y-m-d H:i:s", strtotime("+10 minutes"));
    $token = sprintf('%07d', mt_rand(0, 9999999));
    $url = $application_url . "index.php?verification_email=" . $email . "&verification_code=" . $token;
    return [$token, $url, $code_expiration];
}

function secure_password($password): string
{
    return password_hash($password, PASSWORD_DEFAULT);
}
function login_user($data): bool
{
    $_SESSION["user"] = $data;
    return true;
}

function logout_user(): bool
{
    unset($_SESSION["user"]);
    return true;
}

function is_user_logged_in(): bool
{
    if (isset($_SESSION["user"])) {
        return true;
    } else {
        return false;
    }
}