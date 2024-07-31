<?php
require '../utils/functions.php';
myRequire("utils/errors.php");
myRequire("utils/auth.php");

print_pre($_POST);
$username = secure_input($_POST['username']);
$email = secure_input($_POST['email']);
$password = secure_input($_POST['password']);
$confirm_password = secure_input($_POST['confirm_password']);

if (empty_input($username)) {
    error_and_redirect("signup", ["username_error" => "Username is required"], "index.php");
} elseif (empty_input($email)) {
    error_and_redirect("signup", ["username" => $username, "email_error" => "Email is required"], "index.php");
}elseif (!validate_email($email)) {
    error_and_redirect("signup", ["username" => $username, "email_error" => "Invalid email"], "index.php");
}
elseif (empty_input($password)) {
    error_and_redirect("signup", ["username" => $username, "email" => $email, "password_error" => "Password is required"], "index.php");
} elseif (empty_input($confirm_password)) {
    error_and_redirect("signup", ["username" => $username, "email" => $email, "confirm_password_error" => "Confirm password is required"], "index.php");
} elseif ($password !== $confirm_password) {
    error_and_redirect("signup", ["username" => $username, "email" => $email, "password_error" => "Passwords don't match"], "index.php");
}else{
//    hash the password before storing in the database
    $password = password_hash($password, PASSWORD_DEFAULT);

    if (register_user($username, $email, $password)) {
        redirect("index.php");
    } else {
        error_and_redirect("signup", ["username" => $username, "email" => $email, "password_error" => "Something went wrong"], "index.php");
    }
}


