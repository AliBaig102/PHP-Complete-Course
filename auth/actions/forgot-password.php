<?php
require_once dirname(__DIR__) . '/utils/functions.php';
myRequire("utils/errors.php");
myRequire("utils/auth.php");
myRequire("utils/auth-functions.php");
myRequire("utils/mail.php");

$email = secure_input($_POST['email']);

if (empty_input($email)) {
    error_and_redirect("forgot-password", ["email_error" => "Email is required"], "index.php");
}elseif (!validate_email($email)) {
    error_and_redirect("forgot-password", ["email" => $email, "email_error" => "Invalid email"], "index.php");
} elseif (!is_user_already_registered($email)) {
    error_and_redirect("forgot-password", ["email" => $email, "email_error" => "User does not exist"], "index.php");
} else {
    global $application_name,$application_url;
    [$token, $url, $code_expiration] = generate_token_and_expiration($email);
    // Change url to your reset password page
//     $url = "http://localhost:8000/reset-password.php?token=$token";
    $new_url = $application_url . "reset-password.php?email=" . $email . "&token=" . $token;
    $message = emailTemplate("PHP Auth", $application_name, "Reset Password", "Click on the link below to reset your password", $token, $new_url, "Reset Password");
    if (sendEmail($email, "Reset Password", $message)) {
        update_reset_token($email, $token, $code_expiration);
        success_and_redirect("forgot-password", ["email" => $email, "message" => "Enter the token sent to your email"], "reset-password.php");
    } else {
        error_and_redirect("forgot-password", ["email" => $email, "message" => "Failed to send reset password email"], "index.php");
    }
}