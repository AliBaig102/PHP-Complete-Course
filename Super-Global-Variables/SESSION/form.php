<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <form action="submit.php" method="post">
        <input type="text" name="name">
        <input type="text" name="age">
        <input type="submit">
    </form>

    <?php
    if (isset($_SESSION["name"])) {
        echo "<h1>Welcome, {$_SESSION["name"]}!</h1>";
    }
    ?>
</body>
</html>