<?php
require_once dirname(__DIR__).'/utils/functions.php';
myRequire("utils/errors.php");
myRequire("utils/auth.php");
myRequire("utils/mail.php");

$username = secure_input($_POST['username']);
$email = secure_input($_POST['email']);
$password = secure_input($_POST['password']);
$confirm_password = secure_input($_POST['confirm_password']);

if (empty_input($username)) {
    error_and_redirect("signup", ["username_error" => "Username is required"], "index.php");
} elseif (empty_input($email)) {
    error_and_redirect("signup", ["username" => $username, "email_error" => "Email is required"], "index.php");
} elseif (!validate_email($email)) {
    error_and_redirect("signup", ["username" => $username, "email_error" => "Invalid email"], "index.php");
} elseif (empty_input($password)) {
    error_and_redirect("signup", ["username" => $username, "email" => $email, "password_error" => "Password is required"], "index.php");
} elseif (empty_input($confirm_password)) {
    error_and_redirect("signup", ["username" => $username, "email" => $email, "confirm_password_error" => "Confirm password is required"], "index.php");
} elseif ($password !== $confirm_password) {
    error_and_redirect("signup", ["username" => $username, "email" => $email, "password_error" => "Passwords don't match"], "index.php");
} else {
    global $application_url,$application_name;
//    hash the password before storing in the database
    $password = password_hash($password, PASSWORD_DEFAULT);
//    Generate a 7-digit token for email verification
    $token = sprintf('%07d', mt_rand(0, 9999999));;
    $url = $application_url . "index.php?verification_email=".$email."&verification_code=" . $token;
    date_default_timezone_set("Asia/Karachi");
    $code_expiration = date("Y-m-d H:i:s", strtotime("+10 minutes"));
    //    verify user by sending an email
    $message = emailTemplate("PHP Auth", $application_name, "Verify your email", "Click on the link below to verify your email", $token, $url, "Verify Email");
    if (register_user($username, $email, $password, $token, $code_expiration)) {
        if (sendEmail($email, "Verify your email", $message)) {
            success_and_redirect("signup", ["username" => $username, "email" => $email, "message" => "Check your email to verify your account"], "index.php");
        } else {
            error_and_redirect("signup", ["username" => $username, "email" => $email, "message" => "Failed to send verification email"], "index.php");
        }
    } else {
        error_and_redirect("signup", ["username" => $username, "email" => $email, "message" => "Failed to register user"], "index.php");
    }
}


