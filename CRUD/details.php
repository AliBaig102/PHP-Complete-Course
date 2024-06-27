<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>View Details</title>
</head>
<style>
    details {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 15px;
    }

    summary {
        cursor: pointer;
        font-weight: bold;
    }

    details[open] summary {
        text-decoration: underline;
    }

    details > * {
        margin-top: 10px;
    }

</style>
<body>
<?php
require "dbConnection.php";
$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "<h1>User not found!</h1>";
} else {
    ?>
    <div class="container">

        <h1>User Details</h1>
        <details>
            <summary>Basic Information</summary>
            <p>Name: <?php echo $user['name']; ?></p>
            <p>Email: <?php echo $user['email']; ?></p>
        </details>
    </div>
    <?php
}
?>

</body>
</html>
