<?php
$signup_success_message = '';
$activeClass = "";
$email = "";
$verification_code = "";
if (isset($_SESSION['success']["signup"])) {
    $activeClass = "active";
    $email = $_SESSION['success']["signup"]['email'] ?? "";
    $signup_success_message = $_SESSION['success']['signup']['message'] ?? "";
    if (!empty($signup_success_message)) {
        echo '<script>
            Toastify({
                text: "' . $signup_success_message . '",
                duration: 3000,
                close: true,
                offset: {
                    y: 30
                },
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "#222",
                    borderBottom: "3px solid #fd9329",
                    padding: "10px 20px",
                    boxShadow: "0 0 5px #444",
                },
                onClick: function(){} // Callback after click
            }).showToast();
        </script>';
    }
    unset($_SESSION['success']["signup"]);
}
if (isset($_GET['verification_code'])) {
    $activeClass = "active";
    $email = $_GET['verification_email'] ?? "";
    $verification_code = $_GET['verification_code'];
}
$verification_code_error = "";
if (isset($_SESSION["errors"]['verify'])){
    $activeClass = "active";
    $verification_code_error = $_SESSION["errors"]['verify']['verification_code_error'] ?? "";
    unset($_SESSION["errors"]['verify']);
}
?>
<div class="popup-container email-verification-popup disabled <?= $activeClass; ?>">
    <form action="actions/verify-email.php" method="post">
        <h3>Email Verification</h3>
        <input type="email" name="verification_email" hidden value="<?= $email; ?>">
        <div class="input-group">
            <!--            Verification code will be sent to your email-->
            <label for="verification-code"><i class="fas fa-lock"></i></label>
            <input type="text" name="verification_code" value="<?= $verification_code ?>" id="verification-code" placeholder="Enter 7-digit verification code">
        </div>
        <span class="error"><?= $verification_code_error; ?></span>
        <button type="submit">Verify</button>
    </form>
    <!--    <div class="close-btn"><i class="fas fa-times"></i></div>-->
</div>