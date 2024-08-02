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
?>
<div class="popup-container login-popup  <?php echo $activeClass; ?>">
    <form action="">
        <h3>Login</h3>
        <div class="input-group">
            <label for="username"><i class="fas fa-user"></i></label>
            <input type="text" name="username" id="username" placeholder="Username">
        </div>
        <div class="input-group">
            <label for="password"><i class="fas fa-lock"></i></label>
            <input type="password" name="password" id="password" placeholder="Password">
        </div>
        <strong style="cursor: pointer" class="forgot-password-btn">Forgot password?</strong>
        <button type="submit">Login</button>

    </form>
    <div class="close-btn"><i class="fas fa-times"></i></div>
</div>