<?php
$activeClass = "";
$email_error = "";
if (isset($_SESSION["errors"]["forgot-password"])) {
    $activeClass = "active";
    $email_error = $_SESSION["errors"]["forgot-password"]["email_error"] ?? "";
    unset($_SESSION["errors"]["forgot-password"]);
}
?>
<div class="popup-container forgot-password-popup <?= $activeClass; ?>">
    <form action="actions/forgot-password.php" method="post">
        <h3>Forgot Password</h3>
        <div class="input-group">
            <label for="email"><i class="fas fa-envelope"></i></label>
            <input type="email" name="email" id="email" placeholder="Enter your email">
        </div>
        <span class="error"><?= $email_error; ?></span>
        <button type="submit">Send Email</button>
    </form>
    <div class="close-btn"><i class="fas fa-times"></i></div>
</div>