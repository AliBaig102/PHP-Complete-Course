<?php
$activeClass = "";
$verify_success_message = "";
if (isset($_SESSION["success"]['verify'])) {
    $activeClass = "active";
    $verify_success_message = $_SESSION["success"]['verify']['message'] ?? "";
    if (!empty($verify_success_message)) {
        echo '<script>
            Toastify({
                text: "' . $verify_success_message . '",
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
    unset($_SESSION["success"]['verify']);
}

$email = "";
$email_error = "";
$password_error = "";
if (isset($_SESSION["errors"]['login'])) {
    $activeClass = "active";
    $email_error = $_SESSION["errors"]['login']['email_error'] ?? "";
    $email = $_SESSION["errors"]['login']['email'] ?? "";
    $password_error = $_SESSION["errors"]['login']['password_error'] ?? "";
    unset($_SESSION["errors"]['login']);
}
?>
<div class="popup-container login-popup  <?php echo $activeClass; ?>">
    <form action="actions/login.php" method="post">
        <h3>Login</h3>
        <div class="input-group">
            <label for="email"><i class="fas fa-envelope"></i></label>
            <input type="text" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter email">
        </div>
        <span class="error"><?= $email_error; ?></span>
        <div class="input-group">
            <label for="password"><i class="fas fa-lock"></i></label>
            <input type="password" name="password" id="password" placeholder="Password">
        </div>
        <span class="error"><?= $password_error; ?></span>
        <strong style="cursor: pointer" class="forgot-password-btn">Forgot password?</strong>
        <button type="submit">Login</button>

    </form>
    <div class="close-btn"><i class="fas fa-times"></i></div>
</div>