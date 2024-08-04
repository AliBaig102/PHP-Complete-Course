<?php
require_once dirname(__DIR__) . '/utils/functions.php';
myRequire("utils/errors.php");
myRequire("utils/auth.php");
myRequire("utils/auth-functions.php");

$email = secure_input($_POST['email']);
$password = secure_input($_POST['password']);

if (empty_input($email)) {
    error_and_redirect("login", ["email_error" => "Email is required"], "index.php");
}
elseif (!validate_email($email)) {
    error_and_redirect("login", ["email" => $email, "email_error" => "Invalid email"], "index.php");
}
elseif (empty_input($password)) {
    error_and_redirect("login", ["email" => $email, "password_error" => "Password is required"], "index.php");
}elseif (!is_user_already_registered($email)) {
    error_and_redirect("login", ["email" => $email, "email_error" => "User does not exist"], "index.php");
}else{
    if (check_password($email, $password)) {
        $user_data = get_user_data($email);
        if (login_user($user_data)){
            success_toast("Login Successful", "index.php");
        }
    }else{
        error_and_redirect("login", ["email" => $email, "password_error" => "Invalid password"], "index.php");
    }
}
