<?php
require '../utils/functions.php';
myRequire("utils/errors.php");

print_pre($_POST);
$username = secure_input($_POST['username']);
$email = secure_input($_POST['email']);
$password = secure_input($_POST['password']);
$confirm_password = secure_input($_POST['confirm_password']);

if (empty_input($username)) {
    error_and_redirect("signup_error", [
        "username" => $username,
        "username_error" => "Username is required"
    ], "index.php");
}
if (empty_input($email)) {
    error_and_redirect("signup_error", ["email"=>$email, "email_error" => "Email is required"], "index.php");
}
if (empty_input($password)) {
    error_and_redirect("signup_error", ["password" => "Password is required"], "index.php");
}
if (empty_input($confirm_password)) {
    error_and_redirect("signup_error", ["confirm_password" => "Confirm password is required"], "index.php");
}
if ($password !== $confirm_password) {
    error_and_redirect("signup_error", ["password" => "Passwords don't match"], "index.php");
}

activeLink("index.php");
//} elseif (empty_input($email)){
//    error_and_redirect("Email is empty", "index.php");
//} elseif (empty_input($password)){
//    error_and_redirect("Password is empty", "index.php");
//} elseif (empty_input($confirmPassword)){
//    error_and_redirect("Confirm password is empty", "index.php");
//} elseif ($password !== $confirmPassword){
//    error("Passwords don't match");
//} else {
////    register($username, $email, $password);
//}

