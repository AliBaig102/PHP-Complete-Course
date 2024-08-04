<?php
require_once dirname(__DIR__) . '/utils/functions.php';
myRequire("utils/errors.php");
myRequire("utils/auth.php");
myRequire("utils/auth-functions.php");


$email = secure_input($_POST['email']);
$reset_token = secure_input($_POST['reset_token']);
$new_password = secure_input($_POST['new_password']);
$confirm_password = secure_input($_POST['confirm_password']);

if (empty_input($reset_token)) {
    error_and_redirect("reset-password", ["email" => $email, "reset_token_error" => "Rest token is required"], "reset-password.php");
} elseif (empty_input($new_password)) {
    error_and_redirect("reset-password", ["email" => $email, "reset_token" => $reset_token, "new_password_error" => "New password is required"], "reset-password.php");
} elseif (empty_input($confirm_password)) {
    error_and_redirect("reset-password", ["email" => $email, "reset_token" => $reset_token, "confirm_password_error" => "Confirm password is required"], "reset-password.php");
} elseif ($new_password !== $confirm_password) {
    error_and_redirect("reset-password", ["email" => $email, "reset_token" => $reset_token, "new_password_error" => "Passwords do not match"], "reset-password.php");
}
else{
    if (is_reset_token_code_expired($email)) {
        error_and_redirect("regenerate", ["email" => $email,"button_text" => "Resend Code", "message" => "The reset code has expired. <br><br> Please click on the button below to send a new code."], "reset-password.php");
    }
    else{
        if (check_reset_token($email, $reset_token)) {
            $new_password = secure_password($new_password);
            update_password($email, $new_password);
            success_toast("Password reset successful", "index.php");
        }
        else{
            error_and_redirect("reset-password", ["email" => $email, "reset_token_error" => "Invalid reset token"], "reset-password.php");
        }
    }

}