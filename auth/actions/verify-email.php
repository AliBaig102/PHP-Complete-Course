<?php
require_once dirname(__DIR__) . '/utils/functions.php';
myRequire("utils/errors.php");
myRequire("utils/auth.php");
myRequire("utils/mail.php");
myRequire("utils/auth-functions.php");

print_pre($_POST);
$verification_email = secure_input($_POST['verification_email']);
$verification_code = secure_input($_POST['verification_code']);

if (empty_input($verification_code)) {
    error_and_redirect("verify", ["verification_code_error" => "Verification code is required"], "index.php?verification_email=$verification_email&verification_code=$verification_code");
} elseif (is_verification_code_expired($verification_email)) {
    if (check_email_verification($verification_email)) {
        $user_data = get_user_data($verification_email);
        if (login_user($user_data)){
            success_toast("You have successfully logged in", "index.php");
        }
    }else{
    error_and_redirect("regenerate", ["message" => "The verification code has expired. <br><br> Please click on the button below to send a new code.", "verification_email" => $verification_email,"button_text" => "Send new code"], "index.php");
    }
    //    error_and_redirect("verify", ["verification_code_error" => "Verification code has expired"], "index.php?verification_email=$verification_email&verification_code=$verification_code");
} elseif (check_email_verification($verification_email)) {
    error_toast("Email has already been verified","index.php");
} else {
    if (!check_verification_code($verification_email, $verification_code)) {
        error_and_redirect("verify", ["verification_code_error" => "Invalid verification code"], "index.php?verification_email=$verification_email&verification_code=$verification_code");
    }else{
        if (verify_email($verification_email, $verification_code)) {
            $user_data = get_user_data($verification_email);
            if (login_user($user_data)) {
                success_toast("You have successfully logged in", "index.php");
            }
        }
    }
}
