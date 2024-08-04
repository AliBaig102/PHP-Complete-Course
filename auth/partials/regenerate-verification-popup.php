<?php
$activeClass = "";
$email = "";
$message = "";
$button_text = "Regenerate";
if (isset($_SESSION["errors"]["regenerate"])){
    $activeClass = "active";
    $email = $_SESSION["errors"]["regenerate"]["verification_email"] ?? "";
    $message = $_SESSION["errors"]["regenerate"]["message"] ?? "";
    $button_text = $_SESSION["errors"]["regenerate"]["button_text"] ?? "";
    unset($_SESSION["errors"]["regenerate"]);
}
?>
<div class="popup-container email-verification-popup disabled <?= $activeClass; ?>">
    <form action="actions/regenerate-verification-code.php" method="post">
        <h3>Email Verification</h3>
        <input type="hidden" name="verification_email" value="<?= $email?>">
        <p style="text-align: center; padding: 1rem;">
            <?= $message; ?>
        </p>
        <button type="submit"><?= $button_text; ?></button>
    </form>
    <!--    <div class="close-btn"><i class="fas fa-times"></i></div>-->
</div>