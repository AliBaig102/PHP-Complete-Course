<?php
require_once dirname(__DIR__) . '/utils/functions.php';
myRequire("utils/errors.php");
myRequire("utils/auth.php");
myRequire("utils/mail.php");
myRequire("utils/auth-functions.php");

$email = secure_input($_POST['verification_email']);

[$token, $url, $code_expiration] = generate_token_and_expiration($email);
global $application_name;
$message = emailTemplate("PHP Auth", $application_name, "Verify your email", "Click on the link below to verify your email", $token, $url, "Verify Email");

if (!check_email_verification($email)) {
    error_toast("Email has already been verified","index.php");
}
if (sendEmail($email, "Verify your email", $message)) {
    success_and_redirect("signup", ["email" => $email, "message" => "Check your email to verify your account"], "index.php");
} else {
    error_toast("Failed to send verification email", "index.php");
}