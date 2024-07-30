<?php
// autoload.php @generated by Composer
//require __DIR__ . '/vendor/autoload.php';
//use Dotenv\Dotenv;
//
//$dotenv = Dotenv::createImmutable(__DIR__);
//$dotenv->load();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Authentication System : Dashboard Page</title>
</head>
<body>
<?php
require_once 'partials/nav.php';
?>
<main>
    <div class="heading">

        <h1>
            Welcome to Authentication System
        </h1>
        <h2>
            Welcome
        </h2>
    </div>
    <?php
    require_once 'partials/login-popup.php';
    require_once 'partials/signup-popup.php';
    require_once 'partials/forgot-password-popup.php';
    require_once 'partials/email-verification-popup.php';
    ?>
</main>
<?php
require_once 'partials/footer.php';
?>
</body>
</html>