<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Reset Password</title>
</head>
<body>
<main>
    <?php
    session_start();
    require_once "utils/functions.php";
    $email = "";
    $token = "";
    if (isset($_SESSION["success"]["forgot-password"])) {
        $email = $_SESSION["success"]["forgot-password"]["email"];
        $message = $_SESSION["success"]["forgot-password"]["message"];
        if (!isset($_GET["email"])) {
            echo '<script>
        Toastify({
            text: "' . $message . '",
            duration: 5000,
            offset: {
                y: 30,
            },
            position: "right", // `left`, `center` or `right`
            gravity: "right", // `top` or `bottom`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "#65B741",
                color: "#222",
                borderBottom: "3px solid #387F39",
                padding: "10px 20px",
                boxShadow: "0 0 5px #387F39",
            },
            onClick: function(){} // Callback after click
        }).showToast();
    </script>';
        }
        unset($_SESSION["success"]["forgot-password"]);
    }
    if (isset($_GET["email"]) && isset($_GET["token"])) {
        $email = $_GET["email"];
        $token = $_GET["token"];
    }elseif (isset($_SESSION["errors"]["reset-password"])) {
        $email = $_SESSION["errors"]["reset-password"]["email"] ?? "";
        $token = $_SESSION["errors"]["reset-password"]["reset_token"] ?? "";
        $token_error = $_SESSION["errors"]["reset-password"]["reset_token_error"] ?? "";
        $password_error = $_SESSION["errors"]["reset-password"]["new_password_error"] ?? "";
        $confirm_password_error = $_SESSION["errors"]["reset-password"]["confirm_password_error"] ?? "";
        unset($_SESSION["errors"]["reset-password"]);
    }
    ?>
    <div class="popup-container email-verification-popup active">
        <form action="actions/reset-password.php" method="post">
            <h3>Reset Password</h3>
            <input type="hidden" name="email" value="<?= $email ?? ""; ?>">
            <div class="input-group">
                <label for="reset_token"><i class="fas fa-lock"></i></label>
                <input type="text" name="reset_token" id="reset_token" placeholder="Enter Token Here"
                       value="<?= $token ?? ""; ?>">
            </div>
            <span class="error"><?= $token_error ?? ""; ?></span>
            <div class="input-group">
                <label for="new-password"><i class="fas fa-lock"></i></label>
                <input type="text" name="new_password" id="new-password" placeholder="Enter New Password">
            </div>
            <span class="error"><?= $password_error ?? ""; ?></span>
            <div class="input-group">
                <label for="confirm-password"><i class="fas fa-lock"></i></label>
                <input type="text" name="confirm_password" id="confirm-password" placeholder="Confirm New Password">
            </div>
            <span class="error"><?= $confirm_password_error ?? ""; ?></span>
            <button type="submit">Change</button>
        </form>
    </div>
    <?php
    include_once "partials/regenerate-reset-token-popup.php";
    ?>
</main>
</body>
</html>