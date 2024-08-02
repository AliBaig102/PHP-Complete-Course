<?php
require_once dirname(__DIR__) . '/utils/functions.php';
myRequire("utils/errors.php");
myRequire("utils/auth.php");
myRequire("utils/mail.php");

print_pre($_POST);
$verification_email = secure_input($_POST['verification_email']);
$verification_code = secure_input($_POST['verification_code']);

if (empty_input($verification_code)) {
    error_and_redirect("verify", ["verification_code_error" => "Verification code is required"], "index.php?verification_email=$verification_email&verification_code=$verification_code");
} elseif (is_code_expired($verification_email)) {
    error_and_redirect("verify", ["verification_code_error" => "Verification code has expired"], "index.php?verification_email=$verification_email&verification_code=$verification_code");
} elseif (check_email_verification($verification_email)) {
    error_and_redirect("verify", ["verification_code_error" => "Email has already been verified"], "index.php?verification_email=$verification_email&verification_code=$verification_code");
} else {
    if (verify_email($verification_email, $verification_code)) {
        success_and_redirect("verify", ["message" => "Email verified successfully"], "index.php");
    }
}
